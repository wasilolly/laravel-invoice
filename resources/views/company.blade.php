@extends('index')

@section('navtitle','Company')
@section('content')

<!-- update preloaded company's meta data -->
<div class="card">
	<div class="card-body">
		<form action="{{ route('company.update',['company'=>$company->id])}}" method="POST" enctype="multipart/form-data">
			@csrf
			@method('PUT')
			<div class="form-row">
				<div class="form-group col-md-4">
					<label>Logo</label>
					<input type="file" name="logo" class="form-control">				
				</div>
				<div class="form-group col-md-8">
					<label>Name</label>
					<input type="text" name="name" class="form-control" value="{{$company->name}}">				
				</div>
				<div class="form-group col-md-12">
					<label>Street</label>
					<input type="text" name="street"  class="form-control" value="{{$company->street}}">
				</div>
				<div class="form-group col-md-6">
					<label>City</label>
					<input type="text" name="city" class="form-control" value="{{$company->city}}">
				</div>
				<div class="form-group col-md-6">
					<label>Country</label>
					<input type="text" name="country" class="form-control" value="{{$company->country}}">
				</div>
				<div class="form-group col-md-6">
					<label>Email</label>
					<input type="email" name="email" class="form-control" value="{{$company->email}}">
				</div>
				<div class="form-group col-md-6">
					<label>Phone</label>
					<input type="text" name="phone"  class="form-control" value="{{$company->phone}}" >
				</div>
			</div>
			<div class="text-center">
				<button class="btn btn-secondary" id="cUpdate" type="submit">Update</button>	
			</div>
		</form>
	</div>
</div>

@endsection