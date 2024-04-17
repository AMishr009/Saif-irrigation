@extends('layouts.main')
@push('title')
<title>Add Injectors</title>
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
        <div class="col-lg-7">
<form action="">
    <div class="m-3 d-flex">
        <label for="" class="col-lg-2 form-label float-end">S. No.</label>
        <input type="number" class="form-control">
    </div>
    <div class="m-3 d-flex">
        <label for="" class="col-lg-2 form-label">Tank Name</label>
        <input type="text" class="form-control">
    </div>
    <div class="m-3 d-flex">
        <label for="" class="col-lg-2 form-label">Tank Type</label>
        <input type="text" class="form-control">
    </div>
    <div class="m-3 d-flex">
        <label for="" class="col-lg-2 form-label">Flow Sensor ID</label>
        <input type="text" class="form-control">
    </div>
</form>

</div>
</div>


<div class="d-flex flex-row justify-content-center align-items-center mt-5 align-center">
<button class="btn_orange ms-2">Create</button>
<button class="btn_orange ms-2">Update</button>
<button class="btn_orange ms-2"><a href="{{route('injectors')}}" class="text-white">Cancel</a></button>
</div>
    </section>


        </div> <!-- Col-lg-9 close -->




    </div>
    
    

</div> <!-- End of Container-Fluid -->
    
@push('js')
<script>
    document.getElementById("injectors").className += "active" ;
</script>    
@endpush

@endsection
