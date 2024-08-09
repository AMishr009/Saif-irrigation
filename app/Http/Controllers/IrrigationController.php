<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Irrigation;
use App\Models\Motor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IrrigationController extends Controller
{
    public function irrigation_index()
    {
        $irrigations = Irrigation::all();

        return view('pages.irrigation', compact('irrigations'));
    }

    public function add_irrigation()
    {
        $motors = Motor::where('userid', '=', Auth::user()->id)->get();
        $data = compact('motors');
        return view('pages.add_irrigation')->with($data);
    }

    public function insert_irrigation(Request $request)
    {
        $request->validate([
            'program_no' => 'required|integer',
            'program_name' => 'required|string|max:255',
            'select_valves' => 'required|string|max:255',
            'select_motors' => 'required|string|max:255',
            'irrigation_type' => 'required|string|max:255',
            'total_area' => 'required|string|max:255',
            'required_water' => 'required|string|max:255',
            'total_water' => 'required|string|max:255',
            'fertigation_receipt_no' => 'required|string|max:255',
            'fertigation_type' => 'required',
            'injector_control' => 'required',
            'fertigation_ec' => 'required|string|max:255',
            'pre_water_1' => 'nullable|string|max:255',
            'pre_water_2' => 'nullable|string|max:255',
            'post_water_1' => 'nullable|string|max:255',
            'post_water_2' => 'nullable|string|max:255',
            'fertigation_water_1' => 'nullable|string|max:255',
            'fertigation_water_2' => 'nullable|string|max:255',
        ]);

        // Irrigation::create($request->all());

        $irr = new Irrigation();

        $irr->program_no = $request->program_no;
        $irr->program_name = $request->program_name;
        $irr->select_valves = $request->select_valves;
        $irr->select_motors = $request->select_motors;
        $irr->irrigation_type = $request->irrigation_type;
        $irr->total_area = $request->total_area;
        $irr->required_water = $request->required_water;
        $irr->total_water = $request->total_water;
        $irr->fertigation_receipt_no = $request->fertigation_receipt_no;
        $irr->fertigation_type = $request->fertigation_type;
        $irr->injector_control = $request->injector_control;
        $irr->fertigation_ec = $request->fertigation_ec;
        $irr->pre_water_1 = $request->pre_water_1;
        $irr->pre_water_2 = $request->pre_water_2;
        $irr->post_water_1 = $request->post_water_1;
        $irr->post_water_2 = $request->post_water_2;
        $irr->fertigation_water_1 = $request->fertigation_water_1;
        $irr->fertigation_water_2 = $request->fertigation_water_2;

        $save = $irr->save();

        if($save)
        {
            return redirect()->back()->with('Success', 'Irrigation details created successfully!');
        }
        else
        {
            return redirect()->back()->with('fail', 'Something went wrong!!!');
        }
    
    }
}
