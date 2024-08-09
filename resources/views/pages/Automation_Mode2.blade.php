@extends('layouts.main')
@push('title')
    <title>Automation Mode 2</title>
@endpush

@section('main-section')
    @push('style')
        <style>
            label {
                color: #fb6b49;
                font-weight: 500;
            }

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
            }

            .head_Bold {
                background: #fb6b49;
                color: #fff;
                font-size: 20px;
                font-weight: 700;
            }

            .card_Border {
                border: 1px solid #fb6b49;
                border-radius: 5px;
            }

            /* .form-switch .form-check-input:checked {
                        color: #fb6bfb;
                    } */
            .form-check-input:checked {
                background-color: #fb6b49;
                border-color: #fb6b49;
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
            <!-- <div class="top_line"></div> -->
            <div id="preloader">
                <div class="spinner-border text-blue" role="status">
                  <span class="visually-hidden">Loading...</span>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-lg-2">
                    <!-- <h2>Sidebar</h2> -->
                    @include('layouts.sidebar');
                </div>


                <div class="col-lg-10 mt-lg-5 mt-3">
                    <section class="table_content">

                        <form action="{{ route('add-automation2') }}" method="POST" id="autoForm">
                            @csrf
                            <div class="row">
                        
                                <div class="">
                                    @if (Session::has('Success'))
                                        <div class="alert alert-success">{{ Session::get('Success') }}</div>
                                    @endif
                                    @if (Session::has('fail'))
                                        <div class="alert alert-danger">{{ Session::get('fail') }}</div>
                                    @endif
                        
                                    <div class="mx-lg-5 mx-auto p-3 head_Bold rounded-1">
                                        Fertigation
                                    </div>
                        
                                    <div class="p-3 row card_Border mx-lg-5 mx-auto">
                                        
                                        <!-- Name Field -->
                                        <div class="col-lg-3 m-3">
                                            <label for="name" class="form-label">Name</label>
                                            <input type="text" class="form-control" id="name" name="name">
                                        </div>
                        
                                        <div class="col-lg-3 m-3">
                                            <label for="fertigation_no" class="form-label">Fertigation No.</label>
                                            <input type="text" class="form-control" id="fertigation_no" name="fertigation_no">
                                        </div>
                                        <div class="col-lg-3 m-3">
                                            <label for="fertigation_ph" class="form-label">Fertigation PH</label>
                                            <input type="text" class="form-control" id="fertigation_ph" name="fertigation_ph">
                                        </div>
                                        <div class="col-lg-3 m-3">
                                            <label for="fertigation_receipt_name" class="form-label">Fertigation Receipt Name</label>
                                            <input type="text" class="form-control" id="fertigation_receipt_name" name="fertigation_receipt_name">
                                        </div>
                                        <div class="col-lg-3 m-3">
                                            <label for="stage_name" class="form-label">Stage Name</label>
                                            <input type="text" class="form-control" id="stage_name" name="stage_name">
                                        </div>
                                        <div class="col-lg-3 m-3">
                                            <label for="stage_days" class="form-label">Stage Days</label>
                                            <input type="text" class="form-control" id="stage_days" name="stage_days">
                                        </div>
                                        <div class="m-3 form-check form-switch">
                                            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                                            <label class="form-check-label" for="flexSwitchCheckDefault">Default switch checkbox input</label>
                                        </div>
                                        @if (count($tanks)>0)
                                            @for ($i = 0; $i < count($tanks); $i++)
                                        <div class="col-lg-3 m-3">
                                            <label for="tank1" class="form-label">Tank {{$i+1}}</label>                                            
                                        <select name="tank{{$i+1}}" class="form-control">
                                            <option value="">Select Tank</option>
                                            @foreach ($tanks as $tank)
                                                <option value="{{ $tank->tank_name }}" {{ old('tanks.' . $i) == $tank->tank_name ? 'selected' : '' }}>
                                                    {{ $tank->tank_name }}
                                                </option>
                                            @endforeach
                                        </select>                                    
                                        </div>
                                        @endfor

                                    @else
                                        <h6 class="text-danger"> No tanks available! Please Add Tanks from Settings!</h6 class="text-danger">

                                    @endif      @if (count($tanks)>0)
                                            @for ($i = 0; $i < count($tanks); $i++)                                  
                                        <div class="col-lg-3 m-3 text-center">
                                            <label for="" class="form-label text-center">Or</label>
                                        </div>
                                        @endfor
                                        @endif
                                        {{-- <div class="col-lg-3 m-3 text-center">
                                            <label for="" class="form-label text-center">Or</label>
                                        </div> --}}
                                        @if (count($tanks)>0)
                                            @for ($i = 0; $i < count($tanks); $i++)
                                        <div class="col-lg-3 m-3">
                                            <label for="time_entry{{$i+1}}" class="form-label">Time Entry</label>
                                            <input type="time" class="form-control" id="time_entry{{$i+1}}" name="time_entry{{$i+1}}">
                                        </div>
                                        @endfor

                                    @else
                                        <h6 class="text-danger"> No tanks available! Please Add Tanks from Settings!</h6 class="text-danger">

                                    @endif
                                        
                                        {{-- <div class="col-lg-3 m-3">
                                            <label for="time_entry3" class="form-label">Time Entry</label>
                                            <input type="text" class="form-control" id="time_entry3" name="time_entry3">
                                        </div> --}}
                                    </div>
                        
                                </div>
                            </div>
                        
                        



                        <div class="d-flex flex-row justify-content-center align-items-center mt-5 mb-5 align-center">
                            {{-- <button class="btn_orange ms-2"><a href="{{ route('automation1') }}"
                                    class="text-white">Previous</a></button> --}}
                            <button class="btn_orange ms-2" type="submit">Save</button>
                            <button class="btn_orange ms-2"><a href="{{ route('automation1') }}"
                                    class="text-white">Cancel</a></button>
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
                document.getElementById("automation").className += "active";
            </script>
        @endpush
    @endsection
