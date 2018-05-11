@extends('index')

@section('navtitle','Customer')


@section('content')
<a href="{{ route('customer.create')}}" class="btn btn-secondary btn-xs">New</a>
<a href="{{route('statement')}}" class="btn btn-secondary btn-xs float-right">Statement</a>
<div class="card">
	<div class="card-body">	
		<table class="table tabledata">
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
				<th colspan="5" class="text-center">No Customers in the Database</th>
			</tr>
			@endif
		</table>
	</div>
</div>
        
@endsection
