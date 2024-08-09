<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Motor;

class MotorsController extends Controller
{
    public function motors_index()
    {
        $motors = Motor::where('userid', Auth::user()->id)->get();
        return view('pages.motors', compact('motors'));
    }

    public function add_motors()
    {
        return view('pages.add_motors');
    }

    public function insert_motors(Request $request)
    {
        $request->validate([
            // 's_no' => 'required|integer',
            'line_id' => 'required|string',
            'name' => 'required|string',
            'type' => 'required|string',
        ]);

        $motor = new Motor();
        // $motor->s_no = $request->s_no;
        $motor->userid = Auth::user()->id;
        $motor->line_id = $request->line_id;
        $motor->name = $request->name;
        $motor->type = $request->type;

        if ($motor->save()) {
            return redirect()->back()->with('Success', 'Motor details saved successfully!');
        } else {
            return redirect()->back()->with('fail', 'Something went wrong!');
        }
    }
}
