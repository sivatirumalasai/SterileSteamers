<form action="{{ route("payment_success") }}" method="POST">
    <script
        src="https://checkout.razorpay.com/v1/checkout.js"
        data-key="{{ env("RAZOR_KEY") }}" 
        data-amount="{{ $price*100 }}"
        data-currency="INR"
        data-order_id="{{ $order_id }}"
        data-buttontext="Pay with Razorpay"
        data-name="Sterile Steamers"
        data-description="{{$description}}"
        data-image="{{ url("media/image/logo.png") }}"
        data-prefill.name="{{ $user_name }}"
        data-prefill.email="{{ $email }}"
        data-theme.color="#F37254"
    ></script>
    <input type="hidden" custom="Hidden Element" name="hidden">
    </form>