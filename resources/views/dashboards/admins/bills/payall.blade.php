@extends('layouts.backend')
@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <h3>รายการรายได้ทั้งหมด
                </h3>









                <div class="col-12 col-md-6 order-md-1 order-last">

                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">ตาราง</a></li>
                            <li class="breadcrumb-item active" aria-current="page">รายได้ทั้งหมด
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

                            ตารางรายได้ทั้งหมด


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
                                                        <th>เลขบิล</th>
                                                        <th>การจ่ายเงิน</th>
                                                        <th>รวม</th>
                                                        <th>จัดการ</th>


                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    @foreach ($bills as $item)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>

                                                            <td>{{ $item->bill_id }}</td>

                                                            @if ($item->payment == 1)
                                                                <td><span class="badge bg-primary">เงินสด</span></td>
                                                            @elseif($item->payment == 2)
                                                                <td><span class="badge bg-success">โอนเงิน</span></td>
                                                            @endif

                                                            <td>{{ $item->total }}</td>
                                                            <td>
                                                                <a href="{{ route('pays.delete', $item->id) }}"
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
