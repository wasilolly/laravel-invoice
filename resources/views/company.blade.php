@extends('index')

@section('content')

<div class="card">
	<div class="card-header">Company</div>


	<div class="card-body">
		<form action="{{ route('company.update',['company'=>$company->id])}}" method="POST" enctype="multipart/form-data">
			@csrf
			@method('PUT')
			<div class="form-group">
				<label>Logo</label>
				<input type="file" name="logo" class="form-control">				
			</div>
			<div class="form-group">
				<label>Name</label>
				<input type="text" name="name" class="form-control" value="{{$company->name}}">				
			</div>
			<div class="form-group">
				<label>Street</label>
				<input type="text" name="street"  class="form-control" value="{{$company->street}}">
			</div>
			<div class="form-group">
				<label>City</label>
				<input type="text" name="city" class="form-control" value="{{$company->city}}">
			</div>
			<div class="form-group">
				<label>Country</label>
				<input type="text" name="country" class="form-control" value="{{$company->country}}">
			</div>
			<div class="form-group">
				<label>Email</label>
				<input type="email" name="email" class="form-control" value="{{$company->email}}">
			</div>
			<div class="form-group">
				<label>Phone</label>
				<input type="text" name="phone"  class="form-control" value="{{$company->phone}}" >
			</div>
			
			<button class="btn btn-primary" id="cUpdate" type="submit">Update</button>	
		</form>
	</div>
</div>

@endsection