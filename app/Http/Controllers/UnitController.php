<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{

    public function index()
    {
        $units_all = Unit::all();
        return view('units.main_page_units' , compact('units_all'));
    }


    public function create()
    {
        $units_select = Unit::where('parent_id' , '=' , 0)->get();
        return view('units.createUnits' , compact('units_select'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'unit' => 'required'
        ]);

        $record = Unit::create([
            'unit_name'  => $request->input('unit'),
            'parent_id'    => $request->units ? $request->units : 0,
            'scale'        => $request->input('scale_value'),
        ]);

        return redirect()->route('units_home');
    }

    // public function subunit(Request $request)
    // {

    //     $parent_id = $request->units;

    //     $subunits = Unit::where('id',$parent_id)
    //                         ->with('subunits')
    //                         ->get();


    //     return $subunits;
    //     // return response()->json([
    //     //     'subunits' => $subunits
    //     // ]);
    // }

    public function supUnit(Request $request){
        $parent_id = $request->cat_id;
        // dd($parent_id);
        $supunits = Unit::where('id' , $parent_id)
                                ->with('supunits')
                                ->get();
        return response()->json(['supunits' => $supunits]);
    }



}
