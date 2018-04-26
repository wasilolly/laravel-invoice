@extends('index')

@section('content')

<div class="card">
	<div class="card-header">Customer
		<span class="float-right">
			<a href="{{ route('customer.create')}}" class="btn btn-primary btn-xs">Create</a>
		</span>
	</div>

	<div class="card-body">
		
		<table class="table">
			<thead>
				<tr>
					<th>Name</th>
					<th>Address</th>
					<th>Email</th>
					<th>Phone</th>
					<th>Credit Limit</th>	
				</tr>
			</thead>
			
			@if($customers->count())							
			<tbody>
				@foreach($customers as $customer)
				 <tr>
					<td><a href="{{ route('customer.show',['customer'=>$customer])}}">{{$customer->name}}</a></td>
					<td>{{$customer->address}}</td>
					<td>{{$customer->email}}</td>
					<td>{{$customer->phone}}</td>
					<td>{{$customer->credit_limit}}</td>
				</tr>
				@endforeach
			</tbody>							
			@else
			<tr> 
				<th colspan="5" class="text-center">No Customers</th>
			</tr>
			@endif
		</table>
	</div>
</div>
        
@endsection
