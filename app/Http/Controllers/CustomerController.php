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
        $customers = Customer::orderBy('created_at','DESC')->paginate(10);
        return view('customer.index',compact('customers'));
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
            'name' => 'required|string',
            'phone'=>'required|max:12',
            'address'=>'required|string',
            'email'=>'required|string'
        ]);
        try{
            $customer = Customer::create([
                'name' => $request->name,
                'phone'=>$request->phone,
                'address'=>$request->address,
                'email'=>$request->email
            ]);
            return  view('/customer')->with(['success'=>'Data Telah disimpan']);
        }catch(\Exception $e){
            return redirect()->route('customer.index')->with(['error'=>$e->getMessage()]);
        }
    }   

    /**
     * Display the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = Customer::find($id);
        return view('customer.edit',compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       
            $customer = Customer::find($id);
            $customer->update([
                'name'=>$request->name,
                'phone'=>$request->phone,
                'address'=>$request->address,
                'email'=>$request->email
            ]);
            return redirect()->route('customer.index');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = Customer::find($id);
        $customer->delete();
        return redirect()->route('customer.index');    
    }
}
