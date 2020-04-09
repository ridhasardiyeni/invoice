<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('created_at','DESC')->paginate(10);
        return view('product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Product $product)
    {
        $this->validate($request,[
            'title' => 'required|string|max:100',
            'description'=>'required|string',
            'price'=>'required|integer',
            'stock'=>'required|integer'
        ]);
        try{
            $product = Product::create([
                'title'=> $request->title,  
                'description'=>$request->description,
                'price'=>$request->price,
                'stock'=>$request->stock
            ]); 
            return redirect('/product')->with(['success'=>'<strong>'.$product->title.'</strong> Telah Disimpan']);
        }catch(\Exception $e){
            return redirect()->route('product.create')->with(['error'=> $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        return view('product.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $product = Product::find($id);
        $product->update([
            'title'=>$request->title,
            'description'=>$request->description,
            'price'=>$request->price,
            'stock'=>$request->stock
        ]);
        return redirect()->route('product.index')->with(['success'=>'<strong>'.$product->title.'</strong> Telah Berhasil Diupdate']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect('/product')->with(['success' => '<strong>' . $product->title . '</strong> Dihapus']);
    }
}
