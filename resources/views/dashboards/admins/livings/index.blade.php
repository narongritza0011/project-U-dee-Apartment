@extends('layouts.backend')
@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <h3>จัดการข้อมูลผู้เข้าพักที่อาศัยอยู่
                </h3>









                <div class="col-12 col-md-6 order-md-1 order-last">

                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">ตาราง</a></li>
                            <li class="breadcrumb-item active" aria-current="page">ข้อมูลผู้เข้าพัก</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <!-- Basic Horizontal form layout section start -->
        <section id="basic-horizontal-layouts">
            <div class="row match-height">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">

                            ตารางข้อมูลผู้เข้าพัก

                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <section class="section">

                                    <div class="card">

                                        <div class="card-body">
                                            <table class="table table-striped" id="table1">
                                                <thead>
                                                    <tr>
                                                        <th>ลำดับ</th>
                                                        <th>เลขห้อง</th>
                                                        <th>เลขบัตรประชาชน</th>
                                                        <th>ชื่อ-นามสกุล</th>
                                                        <th>เบอร์ติดต่อ</th>
                                                        <th>ค้างชำระ</th>
                                                        <th>จัดการ</th>

                                                    </tr>
                                                </thead>
                                                <tbody>


                                                    @foreach ($roomers as $item)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>

                                                            <td>{{ $item->room_number }}</td>
                                                            <td>{{ $item->card_number }}</td>
                                                            <td>{{ $item->full_name }}</td>
                                                            <td>{{ $item->tel }}</td>
                                                            <td><span class="text-danger">0</span></td>

                                                            <td>

                                                                <a href="{{ route('living.edit', $item->id) }}"
                                                                    class="btn btn-outline-primary"><i
                                                                        class="bi bi-door-closed-fill"></i>ย้ายออก</a>

                                                            </td>
                                                        </tr>
                                                    @endforeach

                                                </tbody>
                                            </table>
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
