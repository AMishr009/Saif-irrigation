<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\AutomationForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Motor;
use App\Models\Tank;
use App\Models\Valve;


class AutomationController extends Controller
{
    public function automation_mode1()
    {
        $motors = Motor::where('userid', '=', Auth::user()->id)->get();
        $valves = Valve::where('userid', '=', Auth::user()->id)->get();
        $tanks = Tank::where('userid', '=', Auth::user()->id)->get();
        $data = compact('motors', 'valves', 'tanks');
        // return view('pages.manual-mode')->with($data)
        return view('pages.automation_mode1')->with($data);
    }

    public function automation_mode2()
{
    // Check if 'auto1.program_no' is set in the session
    // if (!session()->has('auto1.program_no')) {
    //     return redirect()->route('automation1')->with('error', 'Please start with Automation 1');
    // }

    $tanks = Tank::where('userid', '=', Auth::user()->id)->get();
    $data = compact('tanks');
    return view('pages.automation_mode2')->with($data);
}

public function automation_mode3()
{
    // Check if 'auto1.program_no' is set in the session
    // if (!session()->has('auto1.program_no')) {
    //     return redirect()->route('automation1')->with('error', 'Please start with Automation 1');
    // }

    return view('pages.automation_mode3');
}

public function automation_mode4()
{
    // Check if 'auto1.program_no' is set in the session
    // if (!session()->has('auto1.program_no')) {
    //     return redirect()->route('automation1')->with('error', 'Please start with Automation 1');
    // }

    return view('pages.automation_mode4');
}


    public function alll()
    {
        $motors = Motor::where('userid', '=', Auth::user()->id)->get();
        $valves = Valve::where('userid', '=', Auth::user()->id)->get();
        $tanks = Tank::where('userid', '=', Auth::user()->id)->get();
        $data = compact('motors', 'valves', 'tanks');

        return view('pages.automation_all')->with($data);
    }

    public function insert_automation1(Request $request)
{
    $don = $request->all();

    // Store the data in the session
    session()->put('auto1', $don);
    $auto1 = new AutomationForm();
    $auto1->userid = Auth::user()->id;
    $auto1->program_no = $request->program_no;
    $auto1->program_name = $request->program_name;
    $auto1->dem_valves = $request->dem_valves;
    $auto1->dem_motors = $request->dem_motors;
    $auto1->equi_valves = $request->equi_valves;
    $auto1->equi_tanks = $request->equi_tanks;
    $auto1->equi_motors = $request->equi_motors;
    $save_1 = $auto1->save();

    $tanks = Tank::where('userid', '=', Auth::user()->id)->get();
    $data = compact('tanks');
    if($save_1)
    {
        return redirect('/automation2')->with('data', $tanks)->with('Success', 'Automation 1 saved!');
    }

    // Display all session data
    // echo "<pre>";
    // echo "This is session data:";
    // print_r(session()->all());
    // echo "</pre>";
}

    public function insert_automation2(Request $request)
    {
        // echo "<pre>";
        // // echo "This is session data:";
        // print_r($request->all());
        // echo "</pre>";


        $auto2 = new AutomationForm();
        $previous_auto_1 = $auto2->where('program_no', session()->get('auto1.program_no'))->first();

        $previous_auto_1->fertigation_name = $request->name;
        $previous_auto_1->fertigation_no = $request->fertigation_no;
        $previous_auto_1->fertigation_ph = $request->fertigation_ph;
        $previous_auto_1->fertigation_receipt_name = $request->fertigation_receipt_name;
        $previous_auto_1->stage_name = $request->stage_name;
        $previous_auto_1->stage_days = $request->stage_days;
        $previous_auto_1->tank1 = $request->tank1;
        $previous_auto_1->tank2 = $request->tank2;
        $previous_auto_1->tank3 = $request->tank3;
        $previous_auto_1->time_entry1 = $request->time_entry1;
        $previous_auto_1->time_entry2 = $request->time_entry2;
        $previous_auto_1->time_entry3 = $request->time_entry3;

        $save_2 = $previous_auto_1->save();

        if ($save_2) {
            return redirect('/automation3')->with('Success', 'Automation 2 saved!');
        }
    }

    public function insert_automation3(Request $request)
    {
        // echo "<pre>";
        // // echo "This is session data:";
        // print_r($request->all());
        // echo "</pre>";
        
        $auto3 = new AutomationForm();
        $previous_auto_2 = $auto3->where('program_no', session()->get('auto1.program_no'))->first();

        $previous_auto_2->pre_water_ph = $request->pre_water_ph;
        $previous_auto_2->post_water_ph = $request->post_water_ph;
        $previous_auto_2->total_water_ph = $request->total_water_ph;
        $previous_auto_2->per_water_volume = $request->per_water_volume;
        $previous_auto_2->post_water_volume = $request->post_water_volume;
        $previous_auto_2->total_water_volume = $request->total_water_volume;
        $previous_auto_2->per_water_time = $request->per_water_time;
        $previous_auto_2->post_water_time = $request->post_water_time;
        $previous_auto_2->total_water_time = $request->total_water_time;

        $save_3 = $previous_auto_2->save();

        if($save_3) {
            return redirect('/automation4')->with('Success', 'Automation 3 saved!');
        }
    }

    public function insert_automation4(Request $request)
    {
        // echo "<pre>";
        // // echo "This is session data:";
         //print_r(session()->get('auto1.program_no'));
        // echo "</pre>";


        $auto4 = new AutomationForm();
        $previous_auto_3 = $auto4->where('program_no', session()->get('auto1.program_no'))->first();

        $previous_auto_3->start_date = $request->start_date;
        $previous_auto_3->start_time = $request->start_time;
        $previous_auto_3->cycle = $request->cycle;
        $previous_auto_3->end_time = $request->end_time;
        $previous_auto_3->interval = $request->interval;
        $previous_auto_3->climate_controller_serial_no = $request->serial_no;
        $previous_auto_3->climate_controller_name = $request->name;
        $previous_auto_3->climate_controller_type = $request->type;
        $previous_auto_3->climate_controller_start_time = $request->start_time_climate;
        $previous_auto_3->climate_controller_end_time = $request->end_time_climate;
        $previous_auto_3->climate_controller_on_time = $request->on_time;
        $previous_auto_3->climate_controller_off_time = $request->off_time;

        $save_4 = $previous_auto_3->save();

        if($save_4) {
            session()->forget('auto1');
            return redirect('/schedule')->with('Success', 'Automation Program Setup Complete!');
        }


    }

    public function storeAutomation(Request $requ)
    {

    }

    public function store(Request $request)
{
    $request->validate([
        'program_no' => 'required|string',
        'program_name' => 'required|string',
        'valves' => 'array',
        'valves.*' => 'string',
        'motors' => 'array',
        'motors.*' => 'string',
        'tanks' => 'array',
        'tanks.*' => 'string',
        'fertigation_no' => 'nullable|string',
        'fertigation_ph' => 'nullable|string',
        'fertigation_receipt_name' => 'nullable|string',
        'stage_name' => 'nullable|string',
        'stage_days' => 'nullable|integer',
        'tank_1' => 'nullable|string',
        'tank_2' => 'nullable|string',
        'tank_3' => 'nullable|string',
        'time_entry_1' => 'nullable|string',
        'time_entry_2' => 'nullable|string',
        'time_entry_3' => 'nullable|string',
        'pre_water_ph' => 'nullable|string',
        'post_water_ph' => 'nullable|string',
        'total_water_ph' => 'nullable|string',
        'per_water_volume' => 'nullable|string',
        'post_water_volume' => 'nullable|string',
        'total_water_volume' => 'nullable|string',
        'per_water_time' => 'nullable|string',
        'post_water_time' => 'nullable|string',
        'total_water_time' => 'nullable|string',
        'start_date' => 'nullable|date',
        'start_time' => 'nullable|date_format:H:i',
        'cycle' => 'nullable|string',
        'timer' => 'nullable|string',
        'interval' => 'nullable|string',
        'climate_controller_serial_no' => 'nullable|string',
        'climate_controller_name' => 'nullable|string',
        'climate_controller_type' => 'nullable|string',
        'climate_controller_start_time' => 'nullable|date_format:H:i',
        'climate_controller_end_time' => 'nullable|date_format:H:i',
        'climate_controller_on_time' => 'nullable|date_format:H:i',
        'climate_controller_off_time' => 'nullable|date_format:H:i',
    ]);

    $data = $request->all();
    $data['valves'] = json_encode($request->input('valves'));
    $data['motors'] = json_encode($request->input('motors'));
    $data['tanks'] = json_encode($request->input('tanks'));

    // Save the data
    $form = new AutomationForm();
    $form->fill($data);
    $form->save();

    return redirect()->route('automation.form')->with('Success', 'Form submitted successfully!');
}
}
