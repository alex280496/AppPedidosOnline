<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    public function index(){
    	$products=Product::paginate(10);

    	return view('admin.products.index')->with(compact('products')); // listado
    }
    public function create()
    {
    	return view('admin.products.create');  //formualrio de regirstro
    }
    public function store( Request $request)
    {
    	//registrar un nuevo producto en la base de datos
        //dd($request->all());
        $product=new Product();
        $product->name=$request->input('name');
        $product->description=$request->input('description');
        $product->price=$request->input('price');
        $product->long_description=$request->input('long_description');
        $product->save(); // gurada los datos en la tabla 

        return redirect('/admin/products');

    }

    public function edit($id)
    {
        //return "mostrar el formulario con id $id ";
        $product=Product::find($id);
        return view('admin.products.edit')->with(compact('product'));
    }

    public function update(Request $request, $id){

        $product=Product::find($id);
        $product->name=$request->input('name');
        $product->description=$request->input('description');
        $product->price=$request->input('price');
        $product->long_description=$request->input('long_description');
        $product->save(); // hace un update de un producto qeu ay existia

        return redirect('/admin/products');

         
    }
    public function destroy($id)
    {
        $product=Product::find($id);
        $product->delete();  //elimina el producto seleccionado

        return back();  //regresa a la vista anteriror
    }
}
