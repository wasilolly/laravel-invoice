<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	 <!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>Laravel</title>

	<!-- Styles -->
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
	<link href="{{ asset('css/invoice.css') }}" rel="stylesheet">
	
	
	<!-- Scripts -->
	<script src="{{ asset('js/app.js') }}"></script>

</head>
<body>
	<div class="row">
	<div class="card">
	<div class="card-body">
		<h3 style="color:blue"><b>ORDER NO: {{$order->id}}<b></h3>
		<hr>
		<img src="{{ asset($company->logo)}}" class="img-responsive float-right">
		<h2 style="company-name">{{ $company->name}}</h2>
		<div class="company-details">
			<p>{{$company->street}}</p>
			<p>{{$company->city}}</p>
			<p>{{$company->country}}</p>
			<p>{{ $company->email}}</p>
			<p>{{$company->phone}}</p>
		</div>
		
		
		<h3 style="color:blue">Bill To</h3>
		<div class="customer-details float-left">			
			<p>Name     {{$order->customer->name}}</p>
			<p>Address  {{$order->customer->address}}</p>
			<p>Email    {{$order->customer->email}}</p>
			<p>Phone    {{$order->customer->phone}}</p>
		</div>
		
		<div class="clearfix">
		<span class="statement float-right">
			<h2>For </h2>
			<p>{{$order->note}}</p>
			<h2>Due Date</h2>
			<p>{{ $order->due_date}}</p>
		</span>
		</div>
		<br>
				
		<table class="table">
			<thead>
				<tr>
					<th>Order Date</th>
					<th>Amount</th>
					<th>Payment Date</th>
					<th>Amount</th>
				</tr>
			</thead>								
			<tbody>	
				<tr>
					<td>{{$order->created_at->toDateString()}}</td>
					<td>{{$order->amount}}</td>
					<td>@foreach($order->payments as $payment)					
							{{$payment->created_at->toDateString()}}<br>
						@endforeach
					</td>
					<td>@foreach($order->payments as $payment)	
							{{$payment->amount}}<br>
						@endforeach
					</td>
				</tr>				
			</tbody>							
		</table>			
		<br>
		
		
		<div class="statement float-left">
			<p>Payment Total: {{$order->totalPayments()}}</p>
			<p>Overdue: {{$order->due()}}</p>
			<p>Total:   {{$order->amount}}</p>
		</div>
		
		<div class="clearfix">
		<span class=" statement float-right">
			<p>{{$order->totalPayments()}}</p>
			<p>{{$order->due()}}</p>
			<p>{{$order->amount}}</p>
		</span>
		</div>
		
		<hr>
		<div class="footer">
		<p>Make all checks payable to COMPANY NAME</p>
		<p>If you have any questions concerning this invoice, use the following contact information above</p>
		<h2 class="text-center">THANK YOU FOR YOUR BUSINESS!</h2>
		</div>
		<hr>
	</div>
	</div>
</div>        
</body>
</html>


