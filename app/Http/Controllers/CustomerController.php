<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('customer.index',['customers'=>Customer::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customer.create');
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
			'name' => 'required',
			'address' => 'required',
			'phone' =>'required',
			'email' =>'required',
			'credit' =>'required'
		]);
		
		$cust = Customer::create([
			'name' => $request->name,
			'address' => $request->address,
			'phone' => $request->phone,
			'email' =>$request->email,
			'credit_limit' => $request->credit
		]);
		
		return redirect()->back()->with('status','New Customer created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        $cust=Customer::find($customer->id);
		return view('customer.customer',['customer'=>$cust]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        $cust = Customer::findOrFail($customer->id);
		$this->validate($request,[
			'name' => 'required',
			'address' => 'required',
			'phone' =>'required',
			'email' =>'required',
			'credit' =>'required'
		]);
		
		$cust->name = $request->name;
		$cust->address = $request->address;
		$cust->phone = $request->phone;
		$cust->email=$request->email;
		$cust->credit_limit = $request->credit;
		$cust->save();
		
		return response()->json($cust);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        $cust=Customer::findOrFail($customer->id);
		foreach($cust->orders as $order){
			$order->delete();
		}
		$cust->delete();
		
		return redirect()->route('customer.index')->with('status','Customer Deleted');;
    }
}
