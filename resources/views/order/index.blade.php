@extends('index')

@section('content')

<div class="card">
	<div class="card-header">Order
		<span class="float-right">
			<a href="{{ route('order.create')}}" class="btn btn-primary btn-xs">New</a>
		</span>
	</div>

	<div class="card-body">
		
		<table class="table">
			<thead>
				<tr>
					<th>Date</th>
					<th>Customer</th>
					<th>Amount</th>
					<th>Due</th>
					<th>Note</th>
					<th>Action</th>
				</tr>
			</thead>
			
			@if($orders->count())							
			<tbody>
				@foreach($orders as $order)
				<tr>
					<td>{{$order->created_at->diffForHumans()}}</td>
					<td>{{$order->customer->name}}</td>
					<td>{{$order->amount}}</td>
					<td>{{$order->due_date}}</td>
					<td>{{$order->note}}</td>
					<td><a href="{{ route('order.show',['order'=>$order])}}" class="btn btn-prmary">View</a></td>
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
