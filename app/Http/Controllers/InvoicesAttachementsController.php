<?php

namespace App\Http\Controllers;

use App\Models\invoices_attachements;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InvoicesAttachementsController extends Controller
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $this->validate($request, [

            'file_name' => 'mimes:pdf,jpeg,png,jpg',
    
            ], [
                'file_name.mimes' => 'صيغة المرفق يجب ان تكون   pdf, jpeg , png , jpg',
            ]);
            
            $image = $request->file('file_name');
            $file_name = $image->getClientOriginalName();
    
            $attachments =  new invoices_attachements();
            $attachments->file_name = $file_name;
            $attachments->invoice_number = $request->invoice_number;
            $attachments->id_Invoice = $request->invoice_id;
            $attachments->Created_by = Auth::user()->name;
            $attachments->save();
               
            // move pic
            $imageName = $request->file_name->getClientOriginalName();
            $request->file_name->move(public_path('Attachments/'. $request->invoice_number), $imageName);
            
            return back()->with('Add', 'تم اضافة المرفق بنجاح');
    
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\invoices_attachements  $invoices_attachements
     * @return \Illuminate\Http\Response
     */
    public function show(invoices_attachements $invoices_attachements)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\invoices_attachements  $invoices_attachements
     * @return \Illuminate\Http\Response
     */
    public function edit(invoices_attachements $invoices_attachements)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\invoices_attachements  $invoices_attachements
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {

        $this->middleware('permission:عرض صلاحية', ['only' => ['index']]);
        $this->middleware('permission:اضافة صلاحية', ['only' => ['create', 'store']]);
        $this->middleware('permission:تعديل صلاحية', ['only' => ['edit', 'update']]);
        $this->middleware('permission:حذف صلاحية', ['only' => ['destroy']]);
    }

    public function update(Request $request, invoices_attachements $invoices_attachements)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\invoices_attachements  $invoices_attachements
     * @return \Illuminate\Http\Response
     */
    public function destroy(invoices_attachements $invoices_attachements)
    {
        //
    }
}
