@extends('layouts.backend')
@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>จัดการข้อมูลรถ
                    </h3>
                    {{-- <a class="btn btn-success m-3" href="{{ url()->previous() }}">ย้อนกลับ</a> --}}
                    <a class="btn btn-primary m-3" href="{{ route('cars.all') }}">ย้อนกลับ</a>

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
            <div class="col-sm-12 col-md-8 col-lg-9 col-xl-9">
                <div class="card">
                    <div class="card-header">

                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <section class="section">

                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">ตรวจเช็คสภาพรถ</h4>
                                    </div>
                                    <div class="card-content">
                                        <div class="card-body">

                                            <form class="form form-horizontal" method="POST"
                                                action="{{ route('cars.StoreCheckCar') }}">
                                                @csrf


                                                @if ($check_car > 0)
                                                    <span> </span>
                                                    <div class="alert alert-success" role="alert">
                                                        ทำการตรวจเช็คสภาพรถเเล้ว !!!
                                                    </div>
                                                @else
                                                    <div class="form-body">
                                                        <div class="row">
                                                            <input type="hidden" name="car_id" value="{{ $data->id }}">

                                                            <label>ชื่อ-นามสกุล ลูกค้า</label>

                                                            <div class="col-md-12">
                                                                <div class="form-group ">
                                                                    <div class="position-relative">
                                                                        <input type="text" class="form-control" readonly
                                                                            value="{{ $data->full_name }}">

                                                                    </div>

                                                                </div>
                                                            </div>

                                                            <div class="col-md-12">

                                                                <label>ตรวจน้ำมัน</label>

                                                                <select class="form-select" name="oil_status"
                                                                    aria-label="Default select example">

                                                                    <option value="1">ปกติ</option>

                                                                    <option value="2">ไม่ปกติ</option>

                                                                </select>
                                                                @error('oil_status')
                                                                    <div class="my-2">
                                                                        <span class="text-danger">{{ $message }}</span>
                                                                    </div>
                                                                @enderror
                                                            </div>



                                                            <div class="col-md-12">

                                                                <label>ตรวจเช็คลมยางรถ</label>

                                                                <select class="form-select" name="rubber_status"
                                                                    aria-label="Default select example">

                                                                    <option value="1">ปกติ</option>

                                                                    <option value="2">ไม่ปกติ</option>

                                                                </select>
                                                                @error('rubber_status')
                                                                    <div class="my-2">
                                                                        <span class="text-danger">{{ $message }}</span>
                                                                    </div>
                                                                @enderror
                                                            </div>

                                                            <div class="col-md-12">

                                                                <label>ตรวจเช็คระบบไฟรถ</label>

                                                                <select class="form-select" name="elect_status"
                                                                    aria-label="Default select example">

                                                                    <option value="1">ปกติ</option>

                                                                    <option value="2">ไม่ปกติ</option>

                                                                </select>
                                                                @error('elect_status')
                                                                    <div class="my-2">
                                                                        <span class="text-danger">{{ $message }}</span>
                                                                    </div>
                                                                @enderror
                                                            </div>




                                                            <label>วันที่รับรถ</label>

                                                            <div class="col-md-12">
                                                                <div class="form-group ">
                                                                    <div class="position-relative">
                                                                        <input type="date" class="form-control" value=""
                                                                            name="take_car">

                                                                    </div>
                                                                    @error('take_car')
                                                                        <div class="my-2">
                                                                            <span
                                                                                class="text-danger">{{ $message }}</span>
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </div>




                                                            <div class="col-12 d-flex ">
                                                                <button type="submit"
                                                                    class="btn btn-outline-success me-1 mt-5">บันทึก</button>

                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif






                                            </form>

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

    @include('sweetalert::alert')
@endsection
