@extends('index')

@section('content')
<!--shows a specific order -->
<div class="card">
	<div class="card-header">
		<span class="float-right">
			<form action="{{ route('order.destroy',['order'=>$order])}}" method="POST"
			onsubmit="return confirm('Order and related will be deleted!!')">
				@csrf
				@method('DELETE')
				<button class="btn btn-danger" type="submit">Delete</button>
			</form>
			
		</span>
		<a href="{{ route('invoice',['id'=>$order->id])}}" class="btn btn-info">Invoice</a>	
		<a href="{{ route('invoice.pdf',['id'=>$order->id])}}" class="btn btn-info">PDF</a>	
	</div>
	<div class="row">
	<div class="card-body col-md-5">
		<form action="{{ route('order.update',['order'=>$order])}}" >
			Customer: <input type="text" id="name" value="{{ $order->customer->name }}" readonly><br>
			Due_Date: <input type="date" id="due" value="{{ $order->due_date }}"><br>
			Amount: <input type="number" id="amount" value="{{ $order->amount }}"><br>
			Total Payments: <input type="number" id="totalPay" value="{{$totalPay}}" readonly><br>
			Overdue: <input type="number" id="overdue" value="{{$order->amount - $totalPay}}" readonly><br>
			Note: <textarea id="note" rows="5" cols="10">{{ $order->note }}</textarea><br>
			<button class="btn btn-primary" id="orderUpdate" type="submit">Save</button>
		</form>
	</div>
	<hr>
	
	<!-- payments made on the order-->
	<div class="card-body col-md-5">
		<h3>Payments </h3>
		
		<form action="{{ route('payment.store')}}" id="paystore">
			Amount: <input type="number" id="amt">
			Note: <textarea id="not" rows="5" cols="10"></textarea>
			<button class="btn btn-primary" id="addLine" value="{{ $order->id}}" type="submit">Save</button>
		</form>
		
		@if($order->payments)
		
		<table class="table">
			<thead>
				<th>Date</th>
				<th>Amount Paid</th>
				<th>Note</th>
				<th>Action</th>
			</thead>
			@foreach($order->payments as $payment)		
			<tbody>
				<tr>
					<td>{{$payment->created_at }}</td>
					<td>{{$payment->amount}}</td>
					<td>{{$payment->note}}</td>
					<td>
						<form action="{{ route('payment.destroy',['payment'=>$payment])}}" method="POST"
						onsubmit="return confirm('This payment will be permanently deleted!!')">
							@csrf
							@method('DELETE')
							<button class="btn btn-danger">Delete</button>
						</form>
					</td>
				</tr>
			</tbody>
			@endforeach
		</table>
		
		@endif
	</div>
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
	
	$("#orderUpdate").click(function(event){
		event.preventDefault();

		var data={ note: $('#note').val(),
				   amount: $('#amount').val(),
				   due: $('#due').val()
		};
		var url=$('[id=orderUpdate]').attr("action");
		$.ajax({
			type:'PUT',
			url: url,
			data: data,
			dataType: 'json',
			success: function (data) {
				console.log(data);			
			}				
		});
	});
	
	$('#addLine').click(function(event){ 
		event.preventDefault();
		
		var data={ not: $('#not').val(),
				   amt: $('#amt').val(),
				   id: $(this).val()
				};
		var oldTotal=$('#totalPay').val();
		var oldDue=$('#overdue').val();
		$.ajax({
			type:'POST',
			url: $('[id=paystore]').attr("action"),
			data: data,
			dataType: 'json',
			success: function (data) {
				console.log(data);	
				var newPay='<tr><td>'+data.created_at+'</td><td>'+data.amount+'</td><td>'+data.note+'</td></tr>';
				$('table').prepend(newPay);
				var newTotal = parseInt(oldTotal) + parseInt(data.amount);
				$('#totalPay').val(newTotal);
				var newdue = parseInt(oldDue) - parseInt(data.amount);
				$('#overdue').val(newdue);
			}				
		});
		
	});	
});
@endsection