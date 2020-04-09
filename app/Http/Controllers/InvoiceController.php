<?php

namespace App\Http\Controllers;

use App\Invoice;
use App\Customer;
use App\Product;
use App\Invoice_detail;
use PDF;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invoice = Invoice::with(['customer','detail'])->orderBy('created_at','DESC')->paginate(10);
        return view('invoice.index',compact('invoice'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customers = Customer::orderBy('created_at','DESC')->get();
        return view('invoice.create',compact('customers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $this->validate($request,[
        //     'customer_id' => 'required|exists:customer_id'
        // ]);

        // try{
        $invoice = Invoice::create([
            'customer_id' => $request->customer_id,
            'total' => 0
        ]);
        return redirect(route('invoice.edit', ['id' => $invoice->id]));
        // }catch(\Exception $e){
        //     return redirect()->back()->with(['error'=>$e->getMessage()]);
        // }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function show(Invoice $invoice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $invoice = Invoice::with(['customer','detail','detail.product'])->find($id);
        $products = Product::orderBy('title','ASC')->get();
        return view('invoice.edit',compact('invoice','products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'product_id' => 'required|exists:products,id',
            'qty' => 'required|integer'
        ]);

        try {
            $invoice = Invoice::find($id);
            $product = Product::find($request->product_id);
            $invoice_detail = $invoice->detail()->where('product_id', $product->id)->first();
            
            
            if ($invoice_detail) {
                $invoice_detail->update([
                    'qty' => $invoice_detail->qty + $request->qty
                ]);
            } else {
                Invoice_detail::create([
                    'invoice_id' => $invoice->id,
                    'product_id' => $request->product_id,
                    'price' => $product->price,
                    'qty' => $request->qty
                ]);
            }
            
            
            return redirect()->back()->with(['success' => 'Product Telah Ditambahkan']);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $invoice = Invoice::find($id);
        $invoice->delete();
        return redirect()->back()->with(['success' => 'Data telah dihapus']);
    }

    public function generateInvoice($id)
    {
        $invoice = Invoice::with(['customer','detail','detail.product'])->find($id);
        $pdf = PDF::loadView('invoice.print',compact('invoice'))->setPaper('a4','landscape');
        return $pdf->stream();
    }
}
