<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Company;
use PDF;

class InvoiceController extends Controller
{
    public function orderinvoice($id){
		return view('invoice.singleInvoice',['order'=>Order::findOrFail($id),
								'company'=>Company::first()]);
	}
	
	public function allinvoice(){
		return view('invoice.allorderinvoice',['orders'=>Order::paginate(1),
												'company'=>Company::first()]);
	}
	
	public function invoicepdf($id){
		$pdf=PDF::loadView('invoicepdf',['order'=>Order::findOrFail($id),
								'company'=>Company::first()]);
		return $pdf->stream('invoice.pdf');
	}
}
