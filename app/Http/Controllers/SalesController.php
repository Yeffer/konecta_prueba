<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\Category;
use App\Models\Sales;


class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sales = Sales::all();
        
        return view('sales-show')->with('sales', $sales);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {        
        $products = Product::findOrFail($id);
        $categories = Category::all();
        
        return view('sales')->with('products', $products)->with('categories', $categories);     
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {        
        $product = Product::findOrFail($id);
        $stock = $product->stock;
        $stockSale = $request->sale;
        $idProduct = $product->id;

        if($stockSale == NULL || $stockSale == '' || $stockSale == 0){
            return "No es posible realizar la venta: comprar 0";
        }

        if($stock >= $stockSale){
            $total = ($stock - $stockSale);
            
            $product->update([                
                'stock' => $total,                
            ]);
            
            Sales::create([
                'product_id' => $idProduct,
                'quantity' => $stockSale,
            ]);            

        }elseif($stock < $stockSale){
            return "No es posible realizar la venta. Valor a comprar mayor a la cantidad disponible.";    
        }

        return redirect()->route('home');      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
