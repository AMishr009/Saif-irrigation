<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\AutomationForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class ScheduleController extends Controller
{
    public function schedule_index()
    {
        $auto = new AutomationForm();
        $data = $auto->where('userid', Auth::user()->id)->get();
        
        return view('pages.schedule', compact('data'));
    }

    public function add_schedule()
    {
        return view('pages.add_schedule');
    }

    public function insert_schedule(Request $request)
    {
        // return view('pages.manual');
    }
}
