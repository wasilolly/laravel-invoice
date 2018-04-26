@extends('index')

@section('content')

<div class="card">
	<div class="card-header">
		<span class="float-left">
			<p>Total Order: {{ $tOrders }}</p>
			<p>No. of orders: {{ $orders->count() }}</p>
			<p>Total Payments: {{ $tPays}}</p>
			<p>No. of payments: {{ $payments->count() }}</p>
			<p>Overdue: {{ $tOrders-$tPays }}</p>
		</span>
	</div>

	<div class="card-body">
		
		<table class="table">
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
