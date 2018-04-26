@extends('index')

@section('content')

<div class="card">
	<div class="card-header">Customer
		<span class="float-right">
			<a href="{{ route('customer.index')}}" class="btn btn-primary btn-xs">Back</a>
		</span>			
	</div>
	
	<div class="card-body">
		<form action="{{ route('customer.store') }}" method="POST">
			@csrf
			Name:  <input type="text" name="name"><br>
			Email: <input type="email" name="email"><br>
			Phone: <input type="text" name="phone"><br>
			credit limit: <input type="number" name="credit"><br>
			Address: <textarea name="address" rows="5" cols="10"></textarea><br>
			<button class="btn btn-primary"  type="submit">Save</button>
		</form>
	</div>
</div>
				
@endsection