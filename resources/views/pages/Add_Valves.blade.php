@extends('layouts.main')
@push('title')
<title>Add Valves</title>
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
            <form action="{{ route('valves.store') }}" method="POST">
                @csrf
                {{-- <div class="m-3 d-flex">
                    <label for="s_no" class="col-lg-2 form-label float-end">S. No.</label>
                    <input type="number" name="s_no" placeholder="2" class="form-control">
                </div> --}}
                <div class="m-3 d-flex">
                    <label for="line_id" class="col-lg-2 form-label">Line Id</label>
                    <input type="text" name="line_id" placeholder="Enter Name" class="form-control">
                </div>
                <div class="m-3 d-flex">
                    <label for="name" class="col-lg-2 form-label">Name</label>
                    <input type="text" name="name" placeholder="1" class="form-control">
                </div>
                <div class="m-3 d-flex">
                    <label for="type" class="col-lg-2 form-label">Type</label>
                    <input type="text" name="type" class="form-control">
                </div>
                <div class="m-3 d-flex">
                    <label for="covering_area" class="col-lg-2 form-label">Covering Area</label>
                    <input type="text" name="covering_area" class="form-control">
                </div>
                <div class="m-3 d-flex">
                    <button type="submit" class="btn btn_orange ms-2">Save</button>
                </div>
            </form>
            

</div>
</div>

<div class="d-flex flex-row justify-content-center align-items-center mt-5 align-center">
<button class="btn_orange ms-2">Creaye</button>
<button class="btn_orange ms-2">Update</button>
<button class="btn_orange ms-2"><a href="{{route('valves')}}" class="text-white">Cancel</a></button>
</div>
    </section>


        </div> <!-- Col-lg-9 close -->




    </div>
    
    

</div> <!-- End of Container-Fluid -->
    
@push('js')
<script>
    document.getElementById("valves").className += "active" ;
</script>    
@endpush

@endsection
