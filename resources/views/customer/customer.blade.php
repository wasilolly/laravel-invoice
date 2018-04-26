@extends('index')

@section('content')

<div class="card">
	<div class="card-header">
		<span class="float-right">
			<p>No. of Orders: {{ $customer->orders->count() }}</p>
			<p>No. of payments: {{ $customer->noCustPayments() }}</p>
			<p>Total Order:{{ $customer->totalOrdersAmount() }}</p>
			<p>Total Payments:{{ $customer->totalCustPayments() }}</p>
			<p>Overdue: {{ $customer->overdue() }}</p>
			<form action="{{ route('customer.destroy',['customer'=>$customer])}}" method="POST"
			onsubmit="return confirm('customer and all orders related will be deleted!!')">
				@csrf
				@method('DELETE')
				<button class="btn btn-danger" type="submit">Delete</button>
			</form>
		</span>
		<span class="float-left">
			<form action="{{ route('customer.store') }}">		
				Name:  <input type="text" id="name" value="{{$customer->name}}"><br>
				Address: <textarea id="address" rows="5" cols="10" value="{{$customer->address}}">{{$customer->address}}</textarea><br>
				Email: <input type="email" id="email" value="{{$customer->email}}"><br>
				Phone: <input type="text" id="phone"value="{{$customer->phone}}" ><br>
				credit limit: <input type="number" id="credit" value="{{$customer->credit_limit}}"><br>				
				<button class="btn btn-primary" id="cUpdate" type="submit">Save</button>
			</form>
		</span>
	</div>

	<div class="card-body">	
		<table class="table">
			<thead>
				<tr>
					<th>Order Date</th>
					<th>Amount</th>
					<th>Paid</th>
					<th>Amount Due</th>
					<th>Due Date</th>
					<th>Note</th>
					<th>Action</th>
				</tr>
			</thead>
			
			@if($customer->orders->count())							
			<tbody>
				@foreach($customer->orders as $order)
				<tr>
					<td>{{$order->created_at->diffForHumans()}}</td>
					<td>{{$order->amount}}</td>
					<td>{{$order->totalPayments() }}</td>
					<td>{{$order->due()}}</td>
					<td>{{$order->due_date}}</td>
					<td>{{$order->note}}</td>
					<td><a href="{{ route('order.show',['order'=>$order])}}" class="btn btn-prmary">View</a></td>
				</tr>
				@endforeach
			</tbody>							
			@else
			<tr> 
				<th colspan="5" class="text-center">No Orders lodged for this customer</th>
			</tr>
			@endif
		</table>
	</div>
</div>      
@endsection
@section('script')
$(document).ready(function(){	
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
	$("#cUpdate").click(function(event){
		event.preventDefault();
		var data={name:$('#name').val(),
				  address:$('#address').val(),
				  phone:$('#phone').val(),
				  email:$('#email').val(),
				  credit:$('#credit').val()
				};
		var url=$("[id=cUpdate]").attr("action");
		$.ajax({
			type:'PUT',
			url:url,
			data:data,
			dataType:'json',
			success:function(data){
				console.log(data);
			}	
		});
	});	
});

@endsection