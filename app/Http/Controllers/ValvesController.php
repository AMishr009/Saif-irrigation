<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Valve;

class ValvesController extends Controller
{
    public function valves_index()
    {
        $valves = Valve::where('userid', Auth::user()->id)->get();
        return view('pages.valves', compact('valves'));
    }

    public function add_valves()
    {
        return view('pages.add_valves');
    }

    public function insert_valves(Request $request)
    {
        $request->validate([
            // 's_no' => 'required|integer',
            'line_id' => 'required|string',
            'name' => 'required|string',
            'type' => 'required|string',
            'covering_area' => 'required|string',
        ]);

        $valve = new Valve();
        // $valve->s_no = $request->s_no;
        $valve->userid = Auth::user()->id;
        $valve->line_id = $request->line_id;
        $valve->name = $request->name;
        $valve->type = $request->type;
        $valve->covering_area = $request->covering_area;

        if ($valve->save()) {
            return redirect()->back()->with('Success', 'Valves details saved successfully!');
        } else {
            return redirect()->back()->with('fail', 'Something went wrong!');
        }
    }
}
