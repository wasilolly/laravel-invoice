@extends('index')

@section('navtitle','statement')
@section('content')

<div class="card">
	<div class="card-header">
		<div class="statement float-left">
			<p>Total Order:</p>
			<p>No. of orders: </p>
			<p>Total Payments: </p>
			<p>No. of payments: </p>
			<p>Overdue:</p>
		</div>
		<span class="statement float-right">
			<p>{{ $tOrders }}</p>
			<p>{{ $orders->count() }}</p>
			<p>{{ $tPays}}</p>
			<p>{{ $payments->count() }}</p>
			<p>{{ $tOrders-$tPays }}</p>
		</span>	
	</div>

	<div class="card-body">
		
		<table class="table tabledata">
			<thead>
				<tr>
					<th>Order Date</th>
					<th>Customer</th>
					<th>Amount</th>
					<th>Paid</th>
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
					<td>{{$order->totalPayments() }}</td>
					<td>{{$order->due_date}}</td>
					<td>{{$order->note}}</td>
					<td><a href="{{ route('order.show',['order'=>$order])}}" class="btn btn-prmary">View</a></td>
				</tr>
				@endforeach
			</tbody>							
			@else
			<tr> 
				<th colspan="5" class="text-center">No Orders lodged</th>
			</tr>
			@endif
		</table>
	</div>
</div>
        
@endsection
