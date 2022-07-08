<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Unit;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Show All Data in Product DB
    public function index()
    {
        $products = Product::all();
        return view('products.main_page' , compact('products'));
    }
    // Create Data Page
    public function create()
    {
        $getUnitss = Unit::all();
        return view('products.createProducts' , compact('getUnitss'));
    }
    // Method Convert To Milliliter
    // public function convertToMilliliter($scale){
    //     $value = 1000;
    //     return $value;
    // }

    // Save Data in DB
    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required',
        ]);
        $get_Unit = Unit::where('parent_id' , '!=' , 0)->first();
        if($request->getunit == $get_Unit->id){
            $record = Product::create([
                'name' => $request->product_name,
                'amount_liter' => $request->amount_l,
                'amount_milliliter' => $request->amount_l * $get_Unit->scale ,
                'unit_id' => $request->getunit,
                'total_quantities_liter' => $request->getunit ? $request->amount_l : '',

            ]);
        }else{

            $record = Product::create([
                'name' => $request->product_name,
                'amount_liter' => $request->amount_l,
                'amount_milliliter' => $request->amount_ml,
                'unit_id' => $request->getunit,
                'total_quantities_liter' =>$request->amount_l + ($request->amount_ml / $get_Unit->scale),
                'total_quantities_milliliter' =>($request->amount_l * $get_Unit->scale) +  $request->amount_ml
            ]);
        }
        return redirect()->route('products_home');
    }
    // Delete Product in DB
    public function destroy(Product $product , $id){
        $product = Product::find($id);
        $product->delete();
        return redirect()->route('products_home');
    }
}


