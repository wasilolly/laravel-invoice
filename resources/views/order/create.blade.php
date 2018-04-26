@extends('index')

@section('content')

<div class="card">
	<div class="card-header">Order
		<span class="float-right">
			<a href="{{ route('customer.index')}}" class="btn btn-primary btn-xs">Back</a>
		</span>			
	</div>
	
	<div class="card-body">
		<form action="{{ route('order.store') }}" method="POST">
			@csrf
			Customer: <select name="c_id">
				@foreach($customers as $customer)
					<option value="{{$customer->id}}">{{$customer->name}}</option>					
				@endforeach
			</select><br>
			Amount: <input type="number" name="amount"><br>
			Due_Date: <input type="date" name="due"><br>
			Note: <textarea name="note" rows="5" cols="10"></textarea><br>
			<button class="btn btn-primary"  type="submit">Save</button>
		</form>
	</div>
</div>
        				
@endsection