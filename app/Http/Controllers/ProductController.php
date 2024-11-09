<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use View;

class ProductController extends Controller
{
    //
    public function listAllProducts(Request $request){
        if($request->sb!=null){
            $request->session()->put('col_name', $request->sb);
            $request->session()->put('direction', $request->dir);
        }
        $col_name = $request->session()->get('col_name', 'id');
        $direction = $request->session()->get('direction', 'asc');

        return view('index',['data'=>Product::orderBy($col_name, $direction)->simplePaginate(5)]);
        
    }

    public function showTheFormToCreateANewProduct(Request $request){
        return view('create');
    }

    public function storeANewProduct(Request $request){
        $validated = $request->validate([
            'product_id' => 'required|unique:products',
            'name' => 'required',
            'description' => 'nullable',
            'price' => 'required',
            'stock' => 'nullable',
            'image' => 'nullable',
        ]);

        $imgName= '';
        if($request->image!=null){
            $imgName= time() . "." . $request->image->extension();
            $request->image->move(public_path('images'), $imgName);
        }

        $product=new Product();

        $product->product_id=$request->product_id;
        $product->name=$request->name;
        $product->description=$request->description;
        $product->price=$request->price;
        $product->stock=$request->stock;
        $product->image=$imgName;

        $product->save();

        return 'Create Product successfully';

    }

    public function showASpecificProduct(Request $request){
        return view('show', ['data'=>Product::find($request->id)]);
    }

    public function showTheFormToEditAProduct(Request $request){
        return view('edit', ['data'=>Product::find($request->id)]); //'Show the form to edit a product';
    }

    public function updateAProduct(Request $request){
        $validated = $request->validate([
            'id' => 'required',
            'product_id' => 'required',
            'name' => 'required',
            'description' => 'nullable',
            'price' => 'required',
            'stock' => 'nullable',
            'image' => 'nullable',
        ]);

        /*
        $imgName=time() . "." . $request->image->extention();
        $request->image->move(public_path('images'), $imgName);
        //$request->image=$imgName;
        */

        $imgName= '';
        if($request->image!=null){
            $imgName= time() . "." . $request->image->extension();
            $request->image->move(public_path('images'), $imgName);
        }
        
        $product=Product::find($request->id);
        $product->product_id=$request->product_id;
        $product->name=$request->name;
        $product->description=$request->description;
        $product->price=$request->price;
        $product->stock=$request->stock;
        $product->image=$imgName;

        $product->save();

        return 'Edit Successfull';
    }

    public function deleteAProduct(Request $request){

        Product::destroy($request->id);
        return 'Delete a product';
    }

}
