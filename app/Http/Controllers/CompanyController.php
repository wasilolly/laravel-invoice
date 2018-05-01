<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function update(Request $request){
		$company=Company::first();
		if($request->hasFile('logo')){
			$img = $request->logo;
			$imgNewName= time().$img->getClientOriginalName();
			$img->move('img', $imgNewName);
			$company->logo = 'img/'.$imgNewName;
			$company->save();
		}
		$company->name=$request->name;
		$company->street=$request->street;
		$company->city=$request->city;
		$company->country=$request->country;
		$company->email=$request->email;
		$company->phone=$request->phone;
		$company->save();
		return redirect()->back();
	}
	
	public function company(){
		return view('company',['company'=>Company::first()]);
	}
}
