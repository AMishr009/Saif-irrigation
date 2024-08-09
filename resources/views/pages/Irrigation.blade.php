@extends('layouts.main')
@push('title')
<title>Irrigation</title>
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
            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th> {{ Auth::user()->id }} Program No.</th>
                        <th>Program Name</th>
                        <th>Select Valves</th>
                        <th>Select Motors</th>
                        <th>Irrigation Type</th>
                        <th>Total Area (sqm)</th>
                        <th>Required Water (lit/sqm)</th>
                        <th>Total Water (Ltr)</th>
                        <th>Fertigation Receipt No.</th>
                        <th>Fertigation Type</th>
                        <th>Injector Control</th>
                        <th>Fertigation EC</th>
                        <th>Pre Water</th>
                        <th>Post Water</th>
                        <th>Fertigation Water</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($irrigations as $irrigation)
                    <tr>
                        <td>{{ $irrigation->program_no }}</td>
                        <td>{{ $irrigation->program_name }}</td>
                        <td>{{ $irrigation->select_valves }}</td>
                        <td>{{ $irrigation->select_motors }}</td>
                        <td>{{ $irrigation->irrigation_type }}</td>
                        <td>{{ $irrigation->total_area }}</td>
                        <td>{{ $irrigation->required_water }}</td>
                        <td>{{ $irrigation->total_water }}</td>
                        <td>{{ $irrigation->fertigation_receipt_no }}</td>
                        <td>{{ $irrigation->fertigation_type ? 'Yes' : 'No' }}</td>
                        <td>{{ $irrigation->injector_control ? 'Yes' : 'No' }}</td>
                        <td>{{ $irrigation->fertigation_ec }}</td>
                        <td>{{ $irrigation->pre_water_1 }}<br>{{ $irrigation->pre_water_2 }}</td>
                        <td>{{ $irrigation->post_water_1 }}<br>{{ $irrigation->post_water_2 }}</td>
                        <td>{{ $irrigation->fertigation_water_1 }}<br>{{ $irrigation->fertigation_water_2 }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
</div>
<div class="d-flex flex-row justify-content-center align-items-center mt-5 align-center">
<button class="btn_orange ms-2"><a href="{{route('add-irrigation')}}" class="text-white">Add</a></button>
<button class="btn_orange ms-2">Save</button>
<button class="btn_orange ms-2">Delete</button>
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
