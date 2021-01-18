<?php

namespace App\Http\Controllers\Auth;

use \Exception;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Twilio\Rest\Client;
use Twilio\Exceptions\TwilioException;


class PhoneVerificationController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Phone Verification  Controller
    |--------------------------------------------------------------------------
    |
    | Uses Authy to verify a users phone via voice or sms.
    |
    */

    /**
     * @var Client
     */
    private $client;


    /**
     * @var string
     */
    private $verification_sid;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct( string $verification_sid = null)
    {
        $this->middleware('guest');
        $this->client = new Client(config('app.twilio.account_sid'), config('app.twilio.auth_token'));;
        $this->verification_sid = $verification_sid ?: config('app.twilio.verification_sid');

    }

    /**
     * Get a validator for an incoming verification request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function verificationRequestValidator(array $data)
    {
        return Validator::make($data, [
            'phone_number' => 'required|string'
        ]);
    }

    /**
     * Get a validator for an code verification request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function verificationCodeValidator(array $data)
    {
        return Validator::make($data, [
            'phone_number' => 'required|string',
            'token' => 'required|string|max:10'
        ]);
    }

    /**
     * Request phone verification via PhoneVerificationService.
     *
     * @param  array  $data
     * @return Illuminate\Support\Facades\Response;
     */
    protected function startVerification(Request $request) {

        $data = $request->all();
        $validator = $this->verificationRequestValidator($data);
        extract($data);
        if ($validator->passes()) {
            try {
                $verification = $this->client->verify->v2->services($this->verification_sid)
                ->verifications
                ->create('+91'.$phone_number, 'sms');
                return response()->json(['message'=>'Otp sent to registred mobile number'], 200);
            } catch (TwilioException $exception) {
                $message = "Verification failed to start: $this->verification_sid {$exception->getMessage()}";
                return response()->json($message, 400);
            }
        }

        return response()->json(['errors'=>$validator->errors()->first()], 403);
    }

    /**
     * Request phone verification via PhoneVerificationService.
     *
     * @param  array  $data
     * @return Illuminate\Support\Facades\Response;
     */
    protected function verifyCode(
        Request $request
    ) {
        $data = $request->all();
        $validator = $this->verificationCodeValidator($data);
        extract($data);
        if ($validator->passes()) {
            try {
                $verification_check = $this->client->verify->v2->services($this->verification_sid)
                            ->verificationChecks
                            ->create($token, ['to' => '+91'.$phone_number]);
                if ($verification_check->status === 'approved') {
                    $user=User::updateOrCreate(['mobile'=>$phone_number],['mobile'=>$phone_number,'password'=>Hash::make('123456')]);
                    $user->refresh();
                    if($request->has('environment')){
                        Auth::attempt(['mobile'=>$user->mobile,'password'=>'123456']);
                    }
                    return response()->json(['message'=>"Verification Succss",'data'=>$user], 200);
                }
                return response()->json(['message'=>'Invalid Otp',403]);
            } catch (TwilioException $e) {
                $response['message'] = "OTP Expired";
                return response()->json($response, 403);
            }

        }

        return response()->json(['errors'=>$validator->errors()->first()], 403);
    }
}
