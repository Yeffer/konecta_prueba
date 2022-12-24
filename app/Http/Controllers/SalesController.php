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
        try{
            $sales = Sales::paginate(10);
                    
        } catch(\Illuminate\Database\QueryException $ex){            
            notify()->error($ex->errorInfo[2]);
            return back();
        }  
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
        try{
            $products = Product::findOrFail($id);
            $categories = Category::all();
        } catch(\Illuminate\Database\QueryException $ex){            
            notify()->error($ex->errorInfo[2]);
            return back();
        }  

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
        try{
            $product = Product::findOrFail($id);
            $stock = $product->stock;
            $stockSale = $request->sale;
            $idProduct = $product->id;

            if($stockSale == NULL || $stockSale == '' || $stockSale == 0){   
                notify()->error('No es posible realizar la venta. La venta debe ser diferente de cero.');        
                return back();
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
                notify()->error('No es posible realizar la venta. Valor a comprar mayor a la cantidad disponible.');
                return back();
            }
            
        } catch(\Illuminate\Database\QueryException $ex){            
            notify()->error($ex->errorInfo[2]);
            return back();
        }  
        
        notify()->success('Venta realizada correctamente.'); 
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
