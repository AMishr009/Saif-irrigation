@extends('layouts.main')
@push('title')
<title>Automation Mode 1</title>
@endpush

@section('main-section') 

@push('style')
<style>
    label{
        color: #fb6b49;
        font-weight: 500;
    }
    .top_line{
        width: 100%;
        height:50px;
        background-color:#fb6b49;
        margin: 10px 0px 10px 0px; 
        border-radius: 10px;
    }
    .btn_orange{
        width:100px;
        border-radius: 50px;
        padding : 10px;
        background-color:#fb6b49; 
        border: none;
        color: white; 
    }
    table th{
        color:#3371dc; 
        font-weight: 500;
    }
    .head_Bold{
        background: #fb6b49;
        color: #fff;
        font-size: 20px;
        font-weight: 700;
    }
    .card_Border{
        border: 1px solid #fb6b49;
        border-radius: 5px;
    }

    #preloader {
            display: none; /* Hidden by default */
            position: fixed;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            z-index: 9999;
            background-color: rgba(255, 255, 255, 0.8);
            text-align: center;
        }

        #preloader .spinner-border {
            position: absolute;
            top: 50%;
            left: 50%;
            /* transform: translate(-50%, -50%); */
        }

</style>
@endpush

<body>
    <div class="container-fluid">
        <div id="preloader">
            <div class="spinner-border text-blue" role="status">
              <span class="visually-hidden">Loading...</span>
            </div>
        </div>
        <!-- <div class="top_line"></div> -->
    <div class="row mt-5">
        <div class="col-lg-2">
        <!-- <h2>Sidebar</h2> -->
            @include('layouts.sidebar');
    </div>


        <div class="col-lg-10 mt-lg-5 mt-3">
            @if (Session::has('error'))
                        <div class="alert alert-danger">{{ Session::get('error') }}</div>
                    @endif
            @if (Session::has('Success'))
                        <div class="alert alert-success">{{ Session::get('Success') }}</div>
                    @endif
                    @if (Session::has('fail'))
                        <div class="alert alert-danger">{{ Session::get('fail') }}</div>
                    @endif
        <section class="table_content">
        
            <form action="{{ route('add-automation1') }}" method="POST" id="autoForm">
                @csrf
        <div class="row">
        <div class="">
        <div class=" mx-lg-5 mx-auto p-3 head_Bold rounded-1">
        Land Demography
    </div>

    <div class="p-3 d-flex flex-lg-row flex-column card_Border mx-lg-5 mx-auto">
    <div class=" m-3">
        <label for="" class="form-label">Number of Acres</label>
        <input type="text" name="no_of_acres" class="form-control">
    </div>
    <div class=" m-3">
        <label for="" class="form-label">Irrigation Land</label>
        <input type="text" name="irrigation_land" class="form-control">
    </div> 
    
    <div class=" m-3">
        <label for="" class="form-label">Fertigation Land</label>
        <input type="text" name="fertigation_land" class="form-control">
    </div>

    <div class=" m-3">
        <label for="" class="form-label">Total Land Area</label>
        <input type="text" name="total_land_area" class="form-control">
    </div>

        </div>
</div>
</div>


<div class="row mt-5">
        <div class="">
        <div class=" mx-lg-5 mx-auto p-3 head_Bold rounded-1">
        Equipment
    </div>
<div class="p-3 d-flex flex-lg-row flex-column card_Border mx-lg-5 mx-auto">
    
    <div class=" m-3">
        <label for="" class="form-label">Select Valves</label>
        @if (count($valves)>0)
                                    {{-- @for ($i = 0; $i < count($valves); $i++) --}}
                                        <select name="equi_valves" class="form-control inp">
                                            <option value="">Select Valves</option>
                                            @foreach ($valves as $valve)
                                                <option value="{{ $valve->name }}" {{ old('valves.') == $valve->name ? 'selected' : '' }}>
                                                    {{ $valve->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    {{-- @endfor --}}
                                    @else

                                        <h6 class="text-danger"> No Valves available! Please Add Valves from Settings! </h6>
                                    @endif 
    </div>
    <div class=" m-3">
        <label for="" class="form-label">Select Tanks</label>
        @if (count($tanks)>0)
                                    {{-- @for ($i = 0; $i < count($tanks); $i++) --}}
                                        <select name="equi_tanks" class="form-control">
                                            <option value="">Select Tank</option>
                                            @foreach ($tanks as $tank)
                                                <option value="{{ $tank->tank_name }}" {{ old('tanks.') == $tank->tank_name ? 'selected' : '' }}>
                                                    {{ $tank->tank_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    {{-- @endfor --}}

                                    @else
                                        <h6 class="text-danger"> No tanks available! Please Add Tanks from Settings!</h6 class="text-danger">

                                    @endif
    </div>
    <div class=" m-3">
        <label for="" class="form-label">Select Motors</label>
        @if (count($motors)>0)                                    
                                    @for ($i = 0; $i < count($motors); $i++)
                                        <select name="equi_motors" class="form-control inp" required>
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


</div>
</div>



<div class="d-flex flex-row justify-content-center align-items-center mt-5 align-center">
<button class="btn_orange ms-2" type="submit" id="submitAuto">Create</button>
{{-- <button class="btn_orange ms-2"><a href="{{route('automation2')}}" class="text-white">Next</a></button> --}}
<button class="btn_orange ms-2">Cancel</button>
</div>

</form>
    </section>


        </div> <!-- Col-lg-9 close -->




    </div>
    
    

</div> <!-- End of Container-Fluid -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#autoForm').on('submit', function(e) {
            // Show the preloader
            $('#preloader').show();
            // Simulate a delay to show the preloader for at least 3 seconds
            setTimeout(function() {
                $('#preloader').hide();
            }, 3000);
        });
    });
</script>
@push('js')
<script>
    document.getElementById("automation").className += "active" ;
</script>    
@endpush

@endsection
