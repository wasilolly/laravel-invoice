<?php

namespace App\Http\Controllers;

use App\Order;
use App\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the statements
     *
     * @return \Illuminate\Http\Response
     */
    public function statement()
    {
        $orders=Order::all();
		$payments=Payment::all();
		return view('statement',['tOrders'=>$orders->sum('amount'),
								 'tPays'=>$payments->sum('amount'),
								 'orders'=>$orders,
								 'payments'=>$payments
								]);
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
			'amt'=>'required',
			'not'=>'required',
			'id'=>'required'
		]);
		$payment=Payment::create([
			'amount'=>$request->amt,
			'note'=>$request->not,
			'order_id'=>$request->id
		]);
		
		return response()->json($payment);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment)
    {
        $payment=Payment::findOrFail($payment->id);
		$payment->delete();
		return redirect()->back();
    }
}
