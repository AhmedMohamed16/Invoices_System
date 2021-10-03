<?php

namespace App\Http\Controllers;

use App\Models\Banks;
use App\Models\invoices;
use Illuminate\Http\Request;

class Customers_Report extends Controller
{
    public function index(){

        $banks = Banks::all();
        return view('reports.customers_report',compact('banks'));
          
      }
      public function Search_customers(Request $request){


        // في حالة البحث بدون التاريخ
              
             if ($request->Bank && $request->product && $request->start_at =='' && $request->end_at=='') {
        
               
              $invoices = invoices::select('*')->where('bank_id','=',$request->Bank)->where('product','=',$request->product)->get();
              $banks = Banks::all();
               return view('reports.customers_report',compact('banks','invoices'));
        
            
             }
        
        
          // في حالة البحث بتاريخ
             
             else {
               
               $start_at = date($request->start_at);
               $end_at = date($request->end_at);
        
              $invoices = invoices::whereBetween('invoice_Date',[$start_at,$end_at])->where('section_id','=',$request->Section)->where('product','=',$request->product)->get();
               $banks = Banks::all();
               return view('reports.customers_report',compact('banks','invoices'));
        
              
             }
             
          
            
            }
}
