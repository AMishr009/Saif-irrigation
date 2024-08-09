@extends('layouts.main')
@push('title')
<title>Add Irrigation</title>
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
    .cust_Switch{
        font-size: 25px;
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
        <section class="table_content">
        

        <div class="row">
            @if(Session::has('Success'))
        <div class="alert alert-success">{{Session::get('Success')}}</div>
        @endif
        @if(Session::has('fail'))
        <div class="alert alert-danger">{{Session::get('fail')}}</div>
        @endif
        <div class="">
            <form action="{{ route('irrigation.store') }}" method="POST" class="row">
                @csrf
                <div class="col-lg-3 m-3">
                    <label for="program_no" class="form-label">Program No.</label>
                    <input type="number" name="program_no" class="form-control">
                </div>
                <div class="col-lg-3 m-3">
                    <label for="program_name" class="form-label">Program Name</label>
                    <input type="text" name="program_name" class="form-control">
                </div>
                <div class="m-3 col-lg-3">
                    <label for="select_valves" class="form-label">Select Valves</label>
                    <input type="text" name="select_valves" class="form-control">
                </div>
                <div class="m-3 col-lg-3">
                    <label for="select_motors" class="form-label">Select Motors</label>
                    <select name="select_motors" id="select_motors" class="form-control">
                        @foreach($motors as $motor)
                        <option value="{{ $motor->name }}">{{ $motor->name }}</option>
                        @endforeach
                    </select>
                    {{-- <input type="text" name="select_motors" class="form-control"> --}}
                </div>
                <div class="m-3 col-lg-3">
                    <label for="irrigation_type" class="form-label">Irrigation Type</label>
                    <input type="text" name="irrigation_type" class="form-control">
                </div>
                <div class="m-3 col-lg-3">
                    <label for="total_area" class="form-label">Total Area (sqm)</label>
                    <input type="text" name="total_area" class="form-control">
                </div>
                <div class="m-3 col-lg-3">
                    <label for="required_water" class="form-label">Required water (lit/sqm)</label>
                    <input type="text" name="required_water" class="form-control">
                </div>
                <div class="m-3 col-lg-3">
                    <label for="total_water" class="form-label">Total Water (Ltr)</label>
                    <input type="text" name="total_water" class="form-control">
                </div>
                <div class="m-3 col-lg-3">
                    <label for="fertigation_receipt_no" class="form-label">Fertigation Reciept No.</label>
                    <input type="text" name="fertigation_receipt_no" class="form-control">
                </div>
                <div class="col-lg-3 d-flex flex-column m-3 form-check form-switch ">
                    <label class="form-check-label" for="fertigation_type">Fertigation Type</label>
                    <input class="form-check-input" type="checkbox" name="fertigation_type" id="fertigation_type">
                </div>
                <div class="col-lg-3 d-flex flex-column m-3 form-check form-switch">
                    <label class="form-check-label" for="injector_control">Injector Control</label>
                    <input class="form-check-input" type="checkbox" name="injector_control" id="injector_control">
                </div>
                <div class="col-lg-3 m-3">
                    <label for="fertigation_ec" class="form-label">Fertigation EC</label>
                    <input type="text" name="fertigation_ec" class="form-control">
                </div>
                <div>
                    <div class="m-3 col-lg-3">
                        <label for="pre_water_1" class="form-label">Pre Water</label>
                        <input type="text" name="pre_water_1" class="form-control">
                        <input type="text" name="pre_water_2" class="form-control">
                    </div>
                    <div class="m-3 col-lg-3">
                        <label for="post_water_1" class="form-label">Post Water</label>
                        <input type="text" name="post_water_1" class="form-control">
                        <input type="text" name="post_water_2" class="form-control">
                    </div>
                    <div class="m-3 col-lg-3">
                        <label for="fertigation_water_1" class="form-label">Fertigation Water</label>
                        <input type="text" name="fertigation_water_1" class="form-control">
                        <input type="text" name="fertigation_water_2" class="form-control">
                    </div>
                </div>
                {{-- <div class="m-3 col-lg-3">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div> --}}
                <div class="d-flex flex-row justify-content-center align-items-center mt-5 align-center">
                    <button type="submit" class="btn_orange ms-2">Create</button>
                    {{-- <button class="btn_orange ms-2">Update</button> --}}
                    <button class="btn_orange ms-2"><a href="{{route('irrigation')}}" class="text-white">Cancel</a></button>
                    </div>
            </form>
            
            
</div>
</div>


    </section>


        </div> <!-- Col-lg-9 close -->




    </div>
    
    

</div> <!-- End of Container-Fluid -->
    
@push('js')
<script>
    document.getElementById("irrigation").className += "active" ;
</script>    
@endpush

@endsection
