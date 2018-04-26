<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('order.index',['orders'=>Order::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('order.create',['customers'=>Customer::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
			'c_id'=>'required',
			'amount'=>'required',
			'due'=>'required',
			'note'=>'required'	
		]);
		
		$order=Order::create([
			'customer_id'=>$request->c_id,
			'amount'=>$request->amount,
			'due_date'=>$request->due,
			'note'=>$request->note		
		]);
		
		return redirect()->route('order.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
		$order=Order::findOrFail($order->id);
		$totalPayments=$order->payments->sum('amount');
        return view('order.order',['order'=>$order, 'totalPay'=>$totalPayments]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        $order=Order::findOrFail($order->id);
		$order->amount = $request->amount;
		$order->note = $request->note;
		$order->due_date = $request->due;
		$order->save();
		
		return response()->json($order);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $order=Order::findOrFail($order->id);
		foreach($order->payments as $payment){
			$payment->delete();
		}
		$order->delete();
		return redirect()->route('order.index');
    }
}
