@extends('layouts.backend')
@section('content')

    <head>


        <style>
            @font-face {
                font-family: 'THSarabunNew';
                font-style: normal;
                font-weight: normal;
                src: url("{{ public_path('fonts/THSarabunNew.ttf') }}") format('truetype');
            }

            @font-face {
                font-family: 'THSarabunNew';
                font-style: normal;
                font-weight: bold;
                src: url("{{ public_path('fonts/THSarabunNew Bold.ttf') }}") format('truetype');
            }

            @font-face {
                font-family: 'THSarabunNew';
                font-style: italic;
                font-weight: normal;
                src: url("{{ public_path('fonts/THSarabunNew Italic.ttf') }}") format('truetype');
            }

            @font-face {
                font-family: 'THSarabunNew';
                font-style: italic;
                font-weight: bold;
                src: url("{{ public_path('fonts/THSarabunNew BoldItalic.ttf') }}") format('truetype');
            }

            body {
                font-family: "THSarabunNew";
            }

            table {

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
                    <h3>รายการชำระเงินเเล้ว
                    </h3>
                    {{-- <a class="btn btn-success m-3" href="{{ url()->previous() }}">ย้อนกลับ</a> --}}
                    <a class="btn btn-primary m-3" href="{{ route('admin.cash_success') }}">ย้อนกลับ</a>
                    <div align="right">




                    </div>
                </div>

                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                           
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
                                        <h2 style="text-align: center;">รายการชำระเงินเเล้ว</h2>
                                        <h5 style="text-align: center;">หอพัก อยู่ดีมีสุข</h5>

                                    </div>
                                    <div class="card-content">
                                        <div class="card-body">


                                            <p>
                                                เลขที่บิล <strong>{{ $data->id }}</strong>
                                                ห้อง <strong>{{ $data->room_number }}</strong> เดือน
                                                <strong>{{ $data->bill }}</strong> วันที่ออกบิล
                                                <strong>{{ date('d-m-Y', strtotime($data->created_at)) }}</strong>
                                                ผู้เช่า <strong>{{ $data->full_name }}</strong> โทร
                                                <strong>{{ $data->tel }}</strong>
                                                วิธีชำระเงิน
                                                @if ($bill->payment == 1)
                                                    <strong class="text-success">เงินสด</strong>
                                                @elseif($bill->payment == 2)
                                                    <strong class="text-success">โอนเงิน</strong>
                                                @endif
                                                วันที่ชำระ
                                                <strong>{{ date('d-m-Y', strtotime($bill->created_at)) }}</strong>


                                            </p>
                                            <div style="overflow-x: auto;">
                                                <table style="width: 100%;">
                                                    <tr>
                                                        <th>#</th>
                                                        <th>มิเตอร์ครั้งนี้</th>
                                                        <th>มิเตอร์ครั้งก่อน</th>
                                                        <th>หน่วย</th>
                                                        <th>หน่วยละ</th>
                                                        <th>รวม</th>

                                                    </tr>
                                                    <tr>

                                                        <td>ค่าน้ำ</td>
                                                        <td>{{ $data->water_now_meter }}</td>
                                                        <td>{{ $data->water_old_meter }}</td>
                                                        <td>{{ $data->water_unit }}</td>
                                                        <td>{{ $data->water }}</td>
                                                        <td>{{ $data->water_sum }}</td>

                                                    </tr>
                                                    <tr>

                                                        <td>ค่าไฟ</td>
                                                        <td>{{ $data->electric_now_meter }}</td>
                                                        <td>{{ $data->electric_old_meter }}</td>
                                                        <td>{{ $data->electric_unit }}</td>


                                                        <td>{{ $data->electric }}</td>
                                                        <td>{{ $data->electric_sum }}</td>

                                                    </tr>
                                                    <tr>

                                                        <td colspan="5">ค่าห้อง</td>

                                                        <td>{{ $data->rental_fee }}</td>

                                                    </tr>
                                                    <tr>
                                                        <td colspan="5">รวมเป็นเงิน</td>


                                                        <td>{{ $data->total }}</td>
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
@endsection
