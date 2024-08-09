<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Tank;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class TanksController extends Controller
{
    public function tanks_index()
    {
        $tanks = Tank::where('userid', Auth::user()->id)->get();
        return view('pages.tanks', compact('tanks'));
    }

    public function add_tanks()
    {
        return view('pages.add_tanks');
    }

    public function insert_tanks(Request $request)
    {
        $request->validate([
            // 's_no' => 'required|integer',
            'line_id' => 'required|string',
            'tank_name' => 'required|string',
            'tank_type' => 'required|string',
            'quantity' => 'required|integer',
            'injector_id' => 'required|string',
        ]);

        $tank = new Tank();
        // $tank->s_no = $request->s_no;
        $tank->userid = Auth::user()->id;
        $tank->line_id = $request->line_id;
        $tank->tank_name = $request->tank_name;
        $tank->tank_type = $request->tank_type;
        $tank->quantity = $request->quantity;
        $tank->injector_id = $request->injector_id;

        if ($tank->save()) {
            return redirect()->back()->with('Success', 'Tank details saved successfully!');
        } else {
            return redirect()->back()->with('fail', 'Something went wrong!');
        }
    }
}
