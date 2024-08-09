@extends('layouts.main')
@push('title')
    <title>Automation Mode 3</title>
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
                display: none;
                /* Hidden by default */
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

                        <form action="{{ route('add-automation3') }}" method="post" id="autoForm">
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
                                        Irrigation
                                    </div>
                                    <div class="p-3 row card_Border mx-lg-5 mx-auto">
                                        <div class="col-lg-3 m-3">
                                            <label for="pre_water_ph" class="form-label">Pre Water pH</label>
                                            <input type="text" name="pre_water_ph" id="pre_water_ph"
                                                class="form-control">
                                        </div>
                                        <div class="col-lg-3 m-3">
                                            <label for="post_water_ph" class="form-label">Post Water pH</label>
                                            <input type="text" name="post_water_ph" id="post_water_ph"
                                                class="form-control">
                                        </div>
                                        <div class="col-lg-3 m-3">
                                            <label for="total_water_ph" class="form-label">Total Water pH</label>
                                            <input type="text" name="total_water_ph" id="total_water_ph"
                                                class="form-control">
                                        </div>
                                        <div class="m-3 form-check form-switch">
                                            <input class="form-check-input" type="checkbox" role="switch"
                                                id="volume_switch" name="volume_switch">
                                            <label class="form-check-label" for="volume_switch">Volume</label>
                                        </div>
                                        <div class="col-lg-3 m-3">
                                            <label for="per_water_volume" class="form-label">Per Water Volume %</label>
                                            <input type="text" name="per_water_volume" id="per_water_volume"
                                                class="form-control">
                                        </div>
                                        <div class="col-lg-3 m-3">
                                            <label for="post_water_volume" class="form-label">Post Water Volume %</label>
                                            <input type="text" name="post_water_volume" id="post_water_volume"
                                                class="form-control">
                                        </div>
                                        <div class="col-lg-3 m-3">
                                            <label for="total_water_volume" class="form-label">Total Water Volume %</label>
                                            <input type="text" name="total_water_volume" id="total_water_volume"
                                                class="form-control">
                                        </div>
                                        <div class="col-lg-3 m-3 text-center">
                                            <label for="" class="form-label text-center">OR</label>
                                        </div>
                                        <div class="col-lg-3 m-3 text-center">
                                            <label for="" class="form-label text-center">OR</label>
                                        </div>
                                        <div class="col-lg-3 m-3 text-center">
                                            <label for="" class="form-label text-center">OR</label>
                                        </div>
                                        <div class="col-lg-3 m-3">
                                            <label for="per_water_time" class="form-label">Per Water Time %</label>
                                            <input type="text" name="per_water_time" id="per_water_time"
                                                class="form-control">
                                        </div>
                                        <div class="col-lg-3 m-3">
                                            <label for="post_water_time" class="form-label">Post Water Time %</label>
                                            <input type="text" name="post_water_time" id="post_water_time"
                                                class="form-control">
                                        </div>
                                        <div class="col-lg-3 m-3">
                                            <label for="total_water_time" class="form-label">Total Water Time %</label>
                                            <input type="text" name="total_water_time" id="total_water_time"
                                                class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex flex-row justify-content-center align-items-center mt-5 mb-5 align-center">
                                {{-- <button class="btn_orange ms-2"><a href="{{ route('automation2') }}"
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
