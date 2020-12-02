@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <div class="row">
		<div class="col-md-12 grid-margin stretch-card">
		  <div class="card">
		    <div class="card-body">
		      <h4 class="card-title">Edit Plan</h4>
		      <form class="forms-sample" method="POST" action="{{route('updateplan',$plan->id)}}" enctype=multipart/form-data>
		      	@csrf
		        <div class="form-group">
		          <label for="modelname">Plan Name *</label>
		          <input type="text" name="name" class="form-control" id="modelname" required="" placeholder="Model Name" value="{{$plan->name}}">
		        </div>
		        <div class="form-group">
		          <label for="metakeys">description *</label>
		          <input type="text" name="description" class="form-control" id="metakeys" required="" placeholder="metakeys with ',' seperate " value="{{$plan->description}}">
		        </div>
		        <div class="form-group">
		          <label for="modelname">Price per Month*</label>
		          <input type="text" name="price" class="form-control" id="modelname" required="" placeholder="Model Name" value="{{$plan->price}}">
		        </div>
		        <div class="form-group">
		          <label for="metakeys">Currency*</label>
		          <input type="text" readonly="" name="currency" class="form-control" id="metakeys" value="dollar" value="{{$plan->currency}}">
		        </div>
		        <div class="form-group">
		          <label for="modelname">Duration(In days)*</label>
		          <input type="number" name="duration" class="form-control" id="modelname" required="" placeholder="Model Name" value="{{$plan->duration}}">
		        </div>
		        <div class="form-group">
		          <label for="metakeys">Monthly Plans*</label>
		          <div class="row">
		          	<div class="col-md-6">
		          		<div class="form-group">
				          <label for="modelname">Single month*</label>
				          <input type="number" name="monthly" class="form-control" id="modelname" required="" placeholder="Price per month" value="{{($plan->metadata->monthly)? $plan->metadata->monthly : 0}}">
				        </div>	
				        <div class="form-group">
				          <label for="modelname">Quarterly</label>
				          <input type="number" name="quarterly" class="form-control" id="modelname" placeholder="Quarterly" value="{{($plan->metadata->quarterly)? $plan->metadata->quarterly : 0}}">
				        </div>
		          	</div>
		          	<div class="col-md-6">
		          		<div class="form-group">
				          <label for="modelname">Half Yearly</label>
				          <input type="number" name="half_yearly" class="form-control" id="modelname"  placeholder="Half Yearly" value="{{($plan->metadata->half_yearly)? $plan->metadata->half_yearly : 0}}">
				        </div>	
				        <div class="form-group">
				          <label for="modelname">Yearly</label>
				          <input type="number" name="yearly" class="form-control" id="modelname"  placeholder="Yearly" value="{{($plan->metadata->yearly)? $plan->metadata->yearly : 0}}">
				        </div>
		          	</div>
		          </div>
		        </div>
		        <button type="submit" class="btn btn-success mr-2">Submit</button>
		        <a href="{{route('plugxrplans')}}"><button class="btn btn-light">Cancel</button></a>
		      </form>
		    </div>
		  </div>
		</div>
	</div>
</div>
<script>
// Add the following code if you want the name of the file appear on select
$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
</script>
@endsection