<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\Category;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $products = Product::paginate(10);
        return view("product")->with('products',$products);
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $categories = Category::all(); 
        return view("create-product")->with('categories',$categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'reference' => 'required',
            'price' => 'required',
            'weight' => 'required',
            'category_id' => 'required',
            'stock' => 'required'
        ]);
        
        Product::create([
            'name' => request('name'),
            'reference' => request('reference'),
            'price' => request('price'),
            'weight' => request('weight'),
            'category_id' =>  request('category_id'),
            'stock' => request('stock')
        ]);
       
        notify()->success('Producto creado correctamente');        
        return redirect()->route('home');
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
        
        return view('update-product')->with('products', $products)->with('categories', $categories);        
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
        $product->name = $request->input('name');
        $product->reference = $request->input('reference');
        $product->price = $request->input('price');
        $product->weight = $request->input('weight');        
        $product->category_id = $request->input('category_id');
        $product->stock = $request->input('stock');
        
        if($product->save()){
            notify()->success('Producto actualizado correctamente');
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
        $product = Product::findOrFail($id);
        if($product->delete()){
          notify()->success('Producto eliminado correctamente');
        }
        return redirect()->route('home');
    }
}
