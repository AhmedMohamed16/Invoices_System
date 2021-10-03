<?php

namespace App\Http\Controllers;

use App\Models\Banks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BanksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {

        $this->middleware('permission:عرض صلاحية', ['only' => ['index']]);
        $this->middleware('permission:اضافة صلاحية', ['only' => ['create', 'store']]);
        $this->middleware('permission:تعديل صلاحية', ['only' => ['edit', 'update']]);
        $this->middleware('permission:حذف صلاحية', ['only' => ['destroy']]);
    }

    public function index()
    {
        $banks = Banks::all();
        return view('banks.index', compact('banks'));
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
        $validatedData = $request->validate([
            'bank_name' => 'required|unique:banks|max:255',
        ], [

            'bank_name.required' => 'يرجي ادخال اسم البنك',
            'bank_name.unique' => 'اسم البنك مسجل مسبقا',

        ]);

        Banks::create([
            'bank_name' => $request->bank_name,
            'description' => $request->description,
            'Created_by' => (Auth::user()->name),

        ]);
        return redirect('/banks')->with('Add', 'تم اضافة البنك بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Banks  $banks
     * @return \Illuminate\Http\Response
     */
    public function show(Banks $banks)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Banks  $banks
     * @return \Illuminate\Http\Response
     */
    public function edit(Banks $banks)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Banks  $banks
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->id;
        $this->validate($request, [

            'bank_name' => 'required|max:255|unique:banks,bank_name,'.$id,
        ],[

            'bank_name.unique' =>'اسم البنك مسجل مسبقا',

        ]);

        try {

            $banks = Banks::findOrFail($id);

            $banks->update([

                'bank_name' => $request->bank_name,
                'description' => $request->description,
            ]);
            return redirect('/banks')->with('edit', 'تم تعديل البنك بنجاح');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Banks  $banks
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id; // hidden
        Banks::find($id)->delete();
        session()->flash('delete','تم حذف البنك بنجاح');
        return redirect('/banks');

    }
}
