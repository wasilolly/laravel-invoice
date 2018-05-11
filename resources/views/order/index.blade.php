@extends('index')

@section('navtitle','Orders')
@section('content')
<a href="{{ route('order.create')}}" class="btn btn-secondary btn-xs">New</a>
<a href="{{ route('statement')}}" class="btn btn-secondary btn-xs float-right">Statement</a>
<div class="card">
	<div class="card-body">
		<table class="table tabledata">
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
