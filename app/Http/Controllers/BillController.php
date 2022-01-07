<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Bill;


class BillController extends Controller
{
	 public function bill()
    {
        
        return view('update');
    }
   
	 public function store_bill(Request $request)
    {
         
       $bill=new Bill();
       $bill->cid =$request->input('client');
       $bill->cname =$request->input('cname');
       $bill->product =$request->input('product');
       $bill->height =$request->input('height');
       $bill->width =$request->input('width');
       $bill->total =$request->input('total');
       $bill->price =$request->input('price');
       $bill->grandtotal =$request->input('grandtotal');
       
       
        $bill->save();
        return redirect()->back();

    }
    
   
   
}
