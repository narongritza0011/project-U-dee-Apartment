@extends('layouts.backend')
@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <h3>รายการชำระเงินเเล้ว
                </h3>









                <div class="col-12 col-md-6 order-md-1 order-last">

                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">ตาราง</a></li>
                            <li class="breadcrumb-item active" aria-current="page">ชำระเงินเเล้ว
                            </li>
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

                            ตารางชำระเงินเเล้ว


                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <section class="section">

                                    <div class="card">

                                        <div class="card-body">
                                            <table class="table table-striped" id="table1">
                                                <thead>
                                                    <tr>

                                                        <th>เลขบิล</th>
                                                        <th>ห้อง</th>
                                                        <th>ผู้เช่า</th>
                                                        <th>รอบบิล</th>
                                                        <th>ค่าเช่า</th>
                                                        <th>ค่าน้ำ</th>
                                                        <th>ค่าไฟ</th>
                                                        <th>รวม</th>
                                                        <th>จัดการ</th>

                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    @foreach ($bills as $item)
                                                        <tr>
                                                            <td>{{ $item->id }}</td>
                                                            <td>{{ $item->room_number }}</td>

                                                            <td>{{ $item->full_name }}</td>
                                                            <td>{{ $item->bill }}</td>
                                                            <td>{{ $item->rental_fee }}</td>
                                                            <td>{{ $item->water_sum }}</td>
                                                            <td>{{ $item->electric_sum }}</td>
                                                            <td>{{ $item->total }}</td>

                                                            <td>
                                                                <a href="{{ route('admin.view_success', $item->id) }}"
                                                                    class="btn btn-outline-primary"><i
                                                                        class="bi bi-eye-fill"></i></a>
                                                                <a href="{{ route('bill.delete', $item->id) }}"
                                                                    class="btn btn-outline-danger"><i
                                                                        class="bi bi-trash-fill"></i></a>

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
