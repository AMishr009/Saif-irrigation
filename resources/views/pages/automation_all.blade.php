@extends('layouts.main')

@push('title')
    <title>Automation</title>
@endpush

@section('main-section')
    @push('style')
        <style>
            /* Your custom styles here */
        </style>
    @endpush

    <div class="container-fluid">
        <div class="row mt-5">
            <div class="col-lg-2">
                @include('layouts.sidebar')
            </div>

            <div class="col-lg-10 mt-lg-5 mt-3">
                @if (Session::has('Success'))
                    <div class="alert alert-success">{{ Session::get('Success') }}</div>
                @endif
                @if (Session::has('fail'))
                    <div class="alert alert-danger">{{ Session::get('fail') }}</div>
                @endif
                <section class="table_content">
                    <form action="{{ route('automation.submit') }}" method="POST" class="p-3 card_Border mx-lg-5 mx-auto">
                        @csrf

                        <!-- Land Demography -->
                        <div class="mb-5">
                            <div class="p-3 head_Bold rounded-1">
                                Land Demography
                            </div>
                            <div class="row">
                                <div class="col-lg-3 m-3">
                                    <label for="program_no" class="form-label">Program No.</label>
                                    <input type="text" name="program_no" id="program_no" class="form-control" value="{{ old('program_no') }}">
                                </div>
                                <div class="col-lg-3 m-3">
                                    <label for="program_name" class="form-label">Program Name</label>
                                    <input type="text" name="program_name" id="program_name" class="form-control" value="{{ old('program_name') }}">
                                </div>
                                <div class="col-lg-3 m-3">
                                    <label for="valves" class="form-label">Select Valves</label>
                                    <select name="valves[]" class="form-control" multiple>
                                        @foreach ($valves as $valve)
                                            <option value="{{ $valve->name }}" {{ in_array($valve->name, old('valves', [])) ? 'selected' : '' }}>
                                                {{ $valve->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-3 m-3">
                                    <label for="motors" class="form-label">Select Motors</label>
                                    <select name="motors[]" class="form-control" multiple>
                                        @foreach ($motors as $motor)
                                            <option value="{{ $motor->name }}" {{ in_array($motor->name, old('motors', [])) ? 'selected' : '' }}>
                                                {{ $motor->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Equipment -->
                        <div class="mb-5">
                            <div class="p-3 head_Bold rounded-1">
                                Equipment
                            </div>
                            <div class="row">
                                <div class="col-lg-3 m-3">
                                    <label for="tanks" class="form-label">Select Tanks</label>
                                    <select name="tanks[]" class="form-control" multiple>
                                        @foreach ($tanks as $tank)
                                            <option value="{{ $tank->tank_name }}" {{ in_array($tank->tank_name, old('tanks', [])) ? 'selected' : '' }}>
                                                {{ $tank->tank_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-3 m-3">
                                    <label for="equipment_motors" class="form-label">Select Motors</label>
                                    <select name="equipment_motors[]" class="form-control" multiple>
                                        @foreach ($motors as $motor)
                                            <option value="{{ $motor->name }}" {{ in_array($motor->name, old('equipment_motors', [])) ? 'selected' : '' }}>
                                                {{ $motor->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Fertigation -->
                        <div class="mb-5">
                            <div class="p-3 head_Bold rounded-1">
                                Fertigation
                            </div>
                            <div class="row">
                                <div class="col-lg-3 m-3">
                                    <label for="fertigation_no" class="form-label">Fertigation No.</label>
                                    <input type="text" name="fertigation_no" id="fertigation_no" class="form-control" value="{{ old('fertigation_no') }}">
                                </div>
                                <div class="col-lg-3 m-3">
                                    <label for="fertigation_ph" class="form-label">Fertigation PH</label>
                                    <input type="text" name="fertigation_ph" id="fertigation_ph" class="form-control" value="{{ old('fertigation_ph') }}">
                                </div>
                                <div class="col-lg-3 m-3">
                                    <label for="fertigation_receipt_name" class="form-label">Fertigation Receipt Name</label>
                                    <input type="text" name="fertigation_receipt_name" id="fertigation_receipt_name" class="form-control" value="{{ old('fertigation_receipt_name') }}">
                                </div>
                                <div class="col-lg-3 m-3">
                                    <label for="stage_name" class="form-label">Stage Name</label>
                                    <input type="text" name="stage_name" id="stage_name" class="form-control" value="{{ old('stage_name') }}">
                                </div>
                                <div class="col-lg-3 m-3">
                                    <label for="stage_days" class="form-label">Stage Days</label>
                                    <input type="text" name="stage_days" id="stage_days" class="form-control" value="{{ old('stage_days') }}">
                                </div>
                                <div class="col-lg-3 m-3">
                                    <label for="tank_1" class="form-label">Tank 1</label>
                                    <input type="text" name="tank_1" id="tank_1" class="form-control" value="{{ old('tank_1') }}">
                                </div>
                                <div class="col-lg-3 m-3">
                                    <label for="tank_2" class="form-label">Tank 2</label>
                                    <input type="text" name="tank_2" id="tank_2" class="form-control" value="{{ old('tank_2') }}">
                                </div>
                                <div class="col-lg-3 m-3">
                                    <label for="tank_3" class="form-label">Tank 3</label>
                                    <input type="text" name="tank_3" id="tank_3" class="form-control" value="{{ old('tank_3') }}">
                                </div>
                                <div class="col-lg-3 m-3">
                                    <label for="time_entry_1" class="form-label">Time Entry 1</label>
                                    <input type="text" name="time_entry_1" id="time_entry_1" class="form-control" value="{{ old('time_entry_1') }}">
                                </div>
                                <div class="col-lg-3 m-3">
                                    <label for="time_entry_2" class="form-label">Time Entry 2</label>
                                    <input type="text" name="time_entry_2" id="time_entry_2" class="form-control" value="{{ old('time_entry_2') }}">
                                </div>
                                <div class="col-lg-3 m-3">
                                    <label for="time_entry_3" class="form-label">Time Entry 3</label>
                                    <input type="text" name="time_entry_3" id="time_entry_3" class="form-control" value="{{ old('time_entry_3') }}">
                                </div>
                            </div>
                        </div>

                        <!-- Irrigation -->
                        <div class="mb-5">
                            <div class="p-3 head_Bold rounded-1">
                                Irrigation
                            </div>
                            <div class="row">
                                <div class="col-lg-3 m-3">
                                    <label for="pre_water_ph" class="form-label">Pre Water pH</label>
                                    <input type="text" name="pre_water_ph" id="pre_water_ph" class="form-control" value="{{ old('pre_water_ph') }}">
                                </div>
                                <div class="col-lg-3 m-3">
                                    <label for="post_water_ph" class="form-label">Post Water pH</label>
                                    <input type="text" name="post_water_ph" id="post_water_ph" class="form-control" value="{{ old('post_water_ph') }}">
                                </div>
                                <div class="col-lg-3 m-3">
                                    <label for="total_water_ph" class="form-label">Total Water pH</label>
                                    <input type="text" name="total_water_ph" id="total_water_ph" class="form-control" value="{{ old('total_water_ph') }}">
                                </div>
                                <div class="col-lg-3 m-3">
                                    <label for="irrigation_rate" class="form-label">Irrigation Rate</label>
                                    <input type="text" name="irrigation_rate" id="irrigation_rate" class="form-control" value="{{ old('irrigation_rate') }}">
                                </div>
                            </div>
                        </div>

                        <!-- Schedule -->
                        <div class="mb-5">
                            <div class="p-3 head_Bold rounded-1">
                                Schedule
                            </div>
                            <div class="row">
                                <div class="col-lg-3 m-3">
                                    <label for="schedule_name" class="form-label">Schedule Name</label>
                                    <input type="text" name="schedule_name" id="schedule_name" class="form-control" value="{{ old('schedule_name') }}">
                                </div>
                                <div class="col-lg-3 m-3">
                                    <label for="schedule_days" class="form-label">Schedule Days</label>
                                    <input type="text" name="schedule_days" id="schedule_days" class="form-control" value="{{ old('schedule_days') }}">
                                </div>
                            </div>
                        </div>

                        <!-- Climate Controllers -->
                        <div class="mb-5">
                            <div class="p-3 head_Bold rounded-1">
                                Climate Controllers
                            </div>
                            <div class="row">
                                <div class="col-lg-3 m-3">
                                    <label for="controller_type" class="form-label">Controller Type</label>
                                    <input type="text" name="controller_type" id="controller_type" class="form-control" value="{{ old('controller_type') }}">
                                </div>
                                <div class="col-lg-3 m-3">
                                    <label for="controller_model" class="form-label">Controller Model</label>
                                    <input type="text" name="controller_model" id="controller_model" class="form-control" value="{{ old('controller_model') }}">
                                </div>
                            </div>
                        </div>

                        <div class="d-flex flex-row justify-content-center align-items-center mt-5">
                            <button type="submit" class="btn_orange ms-2">Submit</button>
                            <a href="{{ route('automation.next') }}" class="btn_orange ms-2 text-white">Next</a>
                            <button type="button" class="btn_orange ms-2" onclick="window.location.href='{{ url()->previous() }}'">Cancel</button>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>

    @push('js')
        <script>
            document.getElementById("automation").className += "active";
        </script>
    @endpush
@endsection
