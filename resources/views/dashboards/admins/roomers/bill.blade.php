@extends('layouts.backend')
@section('content')



    <head>
        <style>
            table {
                font-family: arial, sans-serif;
                border-collapse: collapse;
                width: 100%;
            }

            td,
            th {
                border: 1px solid #dddddd;
                text-align: left;
                padding: 8px;
            }

            th {
                background-color: rgb(0, 0, 0);
                color: #fff;
            }

            th th,
            td {
                padding: 15px;
            }

        </style>
    </head>



    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>จัดการข้อมูลผู้เข้าพัก
                    </h3>
                    {{-- <a class="btn btn-success m-3" href="{{ url()->previous() }}">ย้อนกลับ</a> --}}
                    <a class="btn btn-primary m-3" href="{{ route('roomer.all') }}">ย้อนกลับ</a>
                    <div align="right">


                        <a class="btn btn-outline-primary " href="{{ route('roomer.printBill', $data->id) }}">
                            <i class="bi bi-printer-fill"></i>
                            พิมพ์
                        </a>

                    </div>
                </div>

                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">DataTable</li>
                        </ol>

                    </nav>
                </div>
            </div>
        </div>

    </div>

    <!-- Basic Horizontal form layout section start -->
    <section id="basic-horizontal-layouts">
        <div class="row match-height">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-header">

                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <section class="section">

                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">ใบเเจ้งค่ามัดจำ</h4>
                                    </div>
                                    <div class="card-content">
                                        <div class="card-body">
                                            <h2 style="text-align: center;">บิลเก็บค่ามัดจำ, ล่วงหน้า</h2>

                                            <h5 style="text-align: center;">หอพัก อยู่ดีมีสุข</h5>
                                            <p>
                                                ห้อง {{ $data->room_number }} วันที่พิมพ์ {{ $time }} ผู้เช่า
                                                {{ $data->full_name }} โทร {{ $data->tel }}
                                                วันที่เข้าพัก {{ $data->start_date }}
                                            </p>
                                            <div style="overflow-x: auto;">
                                                <table style="width: 100%;">
                                                    <tr>
                                                        <th>#</th>
                                                        <th>รายการ</th>
                                                        <th>หน่วยละ</th>
                                                        <th>จำนวน</th>
                                                        <th>รวม</th>
                                                    </tr>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>ค่ามัดจำ</td>
                                                        <td>{{ $data->price }}</td>
                                                        <td>1</td>
                                                        <td>{{ $data->price }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>2</td>
                                                        <td>ล่วงหน้า</td>
                                                        <td>{{ $data->pay_first }}</td>
                                                        <td>1</td>
                                                        <td>{{ $data->pay_first }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="4">รวมเป็นเงิน</td>

                                                        <td>{{ $result }}</td>
                                                    </tr>
                                                    <tr style="height: 150;">
                                                        <td colspan="3" style="text-align: center;">
                                                            ผู้รับเงิน<br /><br />
                                                            .......................... <br />
                                                            (นายเจ้าของ หอพัก)
                                                        </td>
                                                        <td colspan="3" style="text-align: center;">
                                                            ผู้จ่ายเงิน<br /><br />
                                                            .......................... <br />
                                                            (คุณ {{ $data->full_name }})
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>

                                        </div>


                                    </div>
                                </div>
                                </form>
                        </div>
                    </div>
                </div>







    </section>

    </div>
    </div>
    </div>
    </div>

    </div>
    </section>
    <!-- // Basic Horizontal form layout section end -->

    @include('sweetalert::alert')




@endsection
@section('script')

    <script>
        @if ($errors->all())
        
            $(window).on('load', function() {
            $('#modal-albums').modal('show');
            });
        @endif


        $(document).ready(function() {
            // $('#datepicker').datepicker();
            $('#datepicker').datepicker({
                todayHighlight: true,
                autoclose: true,
                format: "dd/mm/yyyy",
            });
        });
    </script>
@endsection
