@extends('layouts.main')
@push('title')
<title>Schedule</title>
@endpush

@section('main-section') 

@push('style')
<style>
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
            
        <div class="table-responsive d-flex justify-content-center">
            
    <table class="table-bordered text-center"> 
        <tbody>
            <colgroup>
                <col span=2></col>
            </colgroup>
            <tr>
                <th>S. No. {{ session()->get('auto1.program_no') }}</th>
                <th>Sequence No.</th>
                <th>Start Time</th>
                <th>End Time</th>
                <th>Cycle</th>
                <th>Interval (in mins)</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            {{-- @php
                $i=1;
                echo "<pre>";
                print_r($data);
            @endphp --}}
            @foreach ($data as $item)          
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->program_no }} </td>
                <td> {{ $item->start_time }}</td>
                <td> {{ $item->end_time }}</td>
                <td> </td>
                <td> </td>
                <td><i class="fas fa-edit"></i></td>
                <td><i class="fa-solid fa-trash"></i></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="d-flex flex-row justify-content-center align-items-center mt-5 align-center">
<button class="btn_orange ms-2"><a href="{{route('add-schedule')}}" class="text-white">Add</a></button>
<button class="btn_orange ms-2">Save</button>
<button class="btn_orange ms-2">Cancel</button>
</div>
    </section>


        </div> <!-- Col-lg-9 close -->




    </div>
    
    

</div> <!-- End of Container-Fluid -->
    
@push('js')
<script>
    document.getElementById("schedule").className += "active" ;
</script>    
@endpush

@endsection
