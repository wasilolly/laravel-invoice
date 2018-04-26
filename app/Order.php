<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable=['customer_id','amount','due_date','note'];
	
	public function customer(){
		return $this->belongsTo('App\Customer');
	}
	
	public function payments(){
		return $this->hasMany('App\Payment');
	}
	
	public function totalPayments(){
		return $this->payments()->sum('amount');
	}
	
	public function due(){
		return $this->amount-$this->totalPayments();
	}
	
	public function paymentCount(){
		return $this->payments()->count();
	}
}
