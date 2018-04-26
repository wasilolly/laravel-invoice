<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable=['name','email','address','phone','credit_limit'];
	
	public function orders(){
		return $this->hasMany('App\Order');
	}
	
	public function totalOrdersAmount(){
		return $this->orders()->sum('amount');
	}
	//get no of payments on all customer orders
	public function noCustPayments(){
		$total=0;
		foreach($this->orders as $order){
			$total += $order->paymentCount();
		}	
		return $total;
	}
	//get total payments on all customer orders
	public function totalCustPayments(){
		$total=0;
		foreach($this->orders as $order){
			$total += $order->totalPayments();
		}	
		return $total;
	}
	//get tottal due on all others for a customer
	public function overdue(){
		return $this->totalOrdersAmount()-$this->totalCustPayments();
	}
	
}
