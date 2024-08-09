@extends('layouts.main')
@push('title')
<title>Valves</title>
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
                <thead>
                    <tr>
                        <th>S. No.</th>
                        <th>Line ID</th>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Covering Area</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($valves as $valve)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $valve->line_id }}</td>
                            <td>{{ $valve->name }}</td>
                            <td>{{ $valve->type }}</td>
                            <td>{{ $valve->covering_area }}</td>
                            <td><a href="{{-- route('valves.edit', $valve->id) --}}"><i class="fas fa-edit"></i></a></td>
                            <td>
                                <form action="{{-- route('valves.destroy', $valve->id) --}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" style="border: none; background: none;"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
</div>
<div class="d-flex flex-row justify-content-center align-items-center mt-5 align-center">
<button class="btn_orange ms-2"><a href="{{route('add-valves')}}" class="text-white">Add</a></button>
<button class="btn_orange ms-2">Save</button>
<button class="btn_orange ms-2">Cancel</button>
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
