@extends('layouts.main')
@push('title')
    <title>Manual Mode</title>
@endpush

@section('main-section')
    @push('style')
        <style>
            .top_line {
                width: 100%;
                height: 50px;
                background-color: #fb6b49;
                margin: 10px 0px 10px 0px;
                border-radius: 10px;
            }

            .btn_orange {
                width: 100px;
                border-radius: 50px;
                padding: 10px;
                background-color: #fb6b49;
                border: none;
                color: white;
            }

            table th {
                color: #3371dc;
                font-weight: 500;
                padding: 10px;
            }

            label {
                color: #fb6b49;
            }

            .heading_main {
                background-image: linear-gradient(to right, #fb6b49, #fb6b4900, #fb6b4900);
                color: #fff;
                border-radius: 10px;
                padding: 5px;
                font-weight: 500;
            }

            .inp {
                margin-right: 10px;
            }
        </style>
    @endpush

    <body>
        <div class="container-fluid">
            <!-- <div class="top_line"></div> -->
            <div class="row mt-5">
                <div class="col-lg-2">
                    <!-- <h2>Sidebar</h2> -->
                    @include('layouts.sidebar');
                </div>


                <div class="col-lg-10 mt-lg-5 mt-3">
                    @if (Session::has('Success'))
                        <div class="alert alert-success">{{ Session::get('Success') }}</div>
                    @endif
                    @if (Session::has('fail'))
                        <div class="alert alert-danger">{{ Session::get('fail') }}</div>
                    @endif
                    <section class="table_content mx-lg-3 mx-1">
                        <form action="{{ route('manual.mode') }}" method="POST" class="row">
                            @csrf
                            
                        
                            <div class="heading_main col-12 mb-3">Irrigation</div>
                        
                            <div class="col-lg-3 m-3">
                                <label for="pre_water_time" class="form-label">Pre Water Time (in mins)</label>
                                <input type="number" name="pre_water_time" class="form-control rounded-2" value="{{ old('pre_water_time') }}">
                                @error('pre_water_time')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        
                            <div class="col-lg-3 m-3">
                                <label for="ph" class="form-label">Ph</label>
                                <input type="number" name="ph" class="form-control rounded-2" value="{{ old('ph') }}">
                                @error('ph')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        
                            <div class="col-lg-12 m-3 d-flex">
                                <label for="valves" class="col-lg-1 form-label float-end">Valves</label>
                                <div class="input col-lg-10 d-flex">
                                    @if (count($valves)>0)
                                    @for ($i = 0; $i < count($valves); $i++)
                                        <select name="valves[]" class="form-control inp">
                                            <option value="">Select Valves</option>
                                            @foreach ($valves as $valve)
                                                <option value="{{ $valve->name }}" {{ old('valves.' . $i) == $valve->name ? 'selected' : '' }}>
                                                    {{ $valve->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    @endfor
                                    @else

                                        <h6 class="text-danger"> No Valves available! Please Add Valves from Settings! </h6>
                                    @endif 
                                </div>
                                @error('valves')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        
                            <div class="col-lg-12 m-3 d-flex">
                                <label for="motors" class="col-lg-1 form-label float-end">Motors</label>
                                <div class="input col-lg-10 d-flex">
                                    @if (count($motors)>0)                                    
                                    @for ($i = 0; $i < count($motors); $i++)
                                        <select name="motors[]" class="form-control inp" required>
                                            <option value="">Select Motor</option>
                                            @foreach ($motors as $motor)
                                                <option value="{{ $motor->name }}" {{ old('motors.' . $i) == $motor->name ? 'selected' : '' }}>
                                                    {{ $motor->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    @endfor                                        
                                    @else
                                        <h6 class="text-danger"> No Motors available! Add Motors from Settings!</h6>
                                    @endif
                                </div>
                                @error('motors')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        
                            <div class="col-lg-3 d-flex flex-column m-3 form-check form-switch">
                                <label class="form-check-label" for="injector_control">Injector Control</label>
                                <input class="form-check-input" type="checkbox" name="injector_control" id="injector_control" {{ old('injector_control') ? 'checked' : '' }}>
                                @error('injector_control')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        
                            <div class="col-lg-3 m-3">
                                <label for="lph" class="form-label">LPH</label>
                                <input type="number" name="lph" class="form-control rounded-2" value="{{ old('lph') }}">
                                @error('lph')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        
                            <div class="row">
                                {{-- <div class="col-lg-3 d-flex flex-column m-3 form-check form-switch">
                                    <label class="form-check-label" for="tank_sequence">Tank Sequence</label>
                                    <input class="form-check-input" type="checkbox" name="tank_sequence" id="tank_sequence" {{ old('tank_sequence') ? 'checked' : '' }}>
                                    @error('tank_sequence')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div> --}}
                        
                                <div class="col-lg-3 d-flex flex-column m-3 form-check form-switch">
                                    <label class="form-check-label" for="acid_tank">Acid Tank</label>
                                    <input class="form-check-input" type="checkbox" name="acid_tank" id="acid_tank" {{ old('acid_tank') ? 'checked' : '' }}>
                                    @error('acid_tank')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        
                            <div class="col-lg-3 m-3">
                                <label for="post_water_time" class="form-label">Post Water Time (in mins)</label>
                                <input type="number" name="post_water_time" class="form-control rounded-2" value="{{ old('post_water_time') }}">
                                @error('post_water_time')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="heading_main col-12 mb-3">Fertigation</div>
                        
                            <div class="col-lg-12 m-3 d-flex">
                                <label for="tanks" class="col-lg-1 form-label float-end">Tanks</label>
                                <div class="input col-lg-10 d-flex">
                                    @if (count($tanks)>0)
                                    @for ($i = 0; $i < count($tanks); $i++)
                                        <select name="tanks[]" class="form-control inp">
                                            <option value="">Select Tank</option>
                                            @foreach ($tanks as $tank)
                                                <option value="{{ $tank->tank_name }}" {{ old('tanks.' . $i) == $tank->tank_name ? 'selected' : '' }}>
                                                    {{ $tank->tank_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    @endfor

                                    @else
                                        <h6 class="text-danger"> No tanks available! Please Add Tanks from Settings!</h6 class="text-danger">

                                    @endif
                                </div>
                                @error('tanks')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        
                            <div class="col-lg-12 m-3 d-flex">
                                <label for="durations" class="col-lg-1 form-label float-end">Duration</label>
                                <div class="input col-lg-10 d-flex">
                                    @for ($i = 0; $i < count($tanks); $i++)
                                        <select name="durations[]" class="form-control inp">
                                            <option value="">Select Duration</option>
                                            @for ($j = 5; $j <= 90; $j+=5)
                                                <option value="{{ $j }}" {{ old('durations.' . $i) == $j ? 'selected' : '' }}>
                                                    {{ $j }} Mins
                                                </option>
                                            @endfor
                                        </select>
                                    @endfor
                                </div>
                                @error('durations')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        
                            <div class="d-flex flex-row justify-content-center align-items-center mt-5">
                                <button type="submit" class="btn_orange ms-2">Save</button>
                                <button type="button" class="btn_orange ms-2">Start</button>
                                <button type="button" class="btn_orange ms-2">
                                    <a href="{{ route('fertigation') }}" class="text-white text-decoration-none">Cancel</a>
                                </button>
                            </div>
                        </form>
                        



                    </section>


                </div> <!-- Col-lg-9 close -->




            </div>



        </div> <!-- End of Container-Fluid -->

        @push('js')
            <script>
                document.getElementById("manualmode").className += "active";
            </script>
        @endpush
    @endsection
