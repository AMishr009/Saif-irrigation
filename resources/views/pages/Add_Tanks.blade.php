@extends('layouts.main')
@push('title')
<title>Add Tanks</title>
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
        padding: 10px;
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
        <div class="col-lg-7">
            <form action="{{ route('add.tanks') }}" method="POST">
                @csrf
                {{-- <div class="m-3 d-flex">
                    <label for="s_no" class="col-lg-2 form-label float-end">S. No.</label>
                    <input type="number" name="s_no" class="form-control">
                </div> --}}
                <div class="m-3 d-flex">
                    <label for="line_id" class="col-lg-2 form-label">Line Id</label>
                    <input type="text" name="line_id" class="form-control">
                </div>
                <div class="m-3 d-flex">
                    <label for="tank_name" class="col-lg-2 form-label">Tank Name</label>
                    <input type="text" name="tank_name" class="form-control">
                </div>
                <div class="m-3 d-flex">
                    <label for="tank_type" class="col-lg-2 form-label">Tank Type</label>
                    <input type="text" name="tank_type" class="form-control">
                </div>
                <div class="m-3 d-flex">
                    <label for="quantity" class="col-lg-2 form-label">Quantity (in Liters)</label>
                    <input type="text" name="quantity" class="form-control">
                </div>
                <div class="m-3 d-flex">
                    <label for="injector_id" class="col-lg-2 form-label">Injector ID</label>
                    <input type="text" name="injector_id" class="form-control">
                </div>
                <div class="m-3 d-flex">
                    <button type="submit" class="btn_orange ms-2">Save</button>
                </div>
            </form>
            

</div>
</div>

<div class="d-flex flex-row justify-content-center align-items-center mt-5 align-center">
<button class="btn_orange ms-2">Create</button>
<button class="btn_orange ms-2">Update</button>
<button class="btn_orange ms-2"><a href="{{route('tanks')}}" class="text-white">Cancel</a></button>
</div>
    </section>


        </div> <!-- Col-lg-9 close -->




    </div>
    
    

</div> <!-- End of Container-Fluid -->
    
@push('js')
<script>
    document.getElementById("tanks").className += "active" ;
</script>    
@endpush

@endsection
