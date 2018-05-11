@extends('index')

@section('navtitle','New Customer')
@section('content')

<div class="card">
	
	<div class="card-body">
		<form action="{{ route('customer.store') }}" method="POST">
			@csrf
			<p><b>Name:</b><input type="text" name="name"></p>		
			<p><b>Email:</b> <input type="email" name="email"></p>
			<p><b>Phone:</b><input type="text" name="phone"></p>
			<p><b>credit limit:</b> <input type="number" name="credit"></p>
			<p><b>Address:</b> <textarea name="address" rows="5" cols="10"></textarea></p>
			<div class="text-center">
				<button class="btn btn-secondary"  type="submit">Save</button>
			</div>
		</form>
	</div>
</div>
				
@endsection