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
                                        <h4 class="card-title">เเก้ไขข้อมูลรถ</h4>
                                    </div>
                                    <div class="card-content">
                                        <div class="card-body">


                                            <form class="form form-horizontal" method="POST"
                                                action="{{ route('cars.update', $data->id) }}">
                                                @csrf
                                                <div class="form-body">
                                                    <div class="row">
                                                        <label>ชื่อ-นามสกุล ลูกค้า</label>

                                                        <div class="col-md-12">
                                                            <div class="form-group ">
                                                                <div class="position-relative">
                                                                    <input type="text" class="form-control"
                                                                        value="{{ $data->full_name }}" name="full_name">

                                                                </div>
                                                                @error('full_name')
                                                                    <div class="my-2">
                                                                        <span class="text-danger">{{ $message }}</span>
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <label>เบอร์ติดต่อ</label>

                                                        <div class="col-md-12">
                                                            <div class="form-group ">
                                                                <div class="position-relative">
                                                                    <input type="text" class="form-control"
                                                                        value="{{ $data->tel }}" name="tel">

                                                                </div>
                                                                @error('tel')
                                                                    <div class="my-2">
                                                                        <span class="text-danger">{{ $message }}</span>
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <label>ยี่ห้อ</label>

                                                        <div class="col-md-12">
                                                            <div class="form-group ">
                                                                <div class="position-relative">
                                                                    <input type="text" class="form-control" name="brand"
                                                                        value="{{ $data->brand }}">

                                                                </div>
                                                                @error('brand')
                                                                    <div class="my-2">
                                                                        <span class="text-danger">{{ $message }}</span>
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <label>รุ่น</label>

                                                        <div class="col-md-12">
                                                            <div class="form-group ">
                                                                <div class="position-relative">
                                                                    <input type="text" class="form-control" name="model"
                                                                        value="{{ $data->model }}">

                                                                </div>
                                                                @error('model')
                                                                    <div class="my-2">
                                                                        <span class="text-danger">{{ $message }}</span>
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </div>


                                                        <label>เลขทะเบียน</label>

                                                        <div class="col-md-12">
                                                            <div class="form-group ">
                                                                <div class="position-relative">
                                                                    <input type="text" class="form-control"
                                                                        value="{{ $data->number_car }}"
                                                                        name="number_car">

                                                                </div>
                                                                @error('number_car')
                                                                    <div class="my-2">
                                                                        <span class="text-danger">{{ $message }}</span>
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </div>


                                                        <label>วันที่ตรวจเช็ค</label>

                                                        <div class="col-md-12">
                                                            <div class="form-group ">
                                                                <div class="position-relative">
                                                                    <input type="date" class="form-control"
                                                                        value="{{ $data->check_date }}"
                                                                        name="check_date">

                                                                </div>
                                                                @error('check_date')
                                                                    <div class="my-2">
                                                                        <span class="text-danger">{{ $message }}</span>
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <label>หมายเหตุ</label>

                                                        <div class="col-md-12">
                                                            <div class="form-group ">
                                                                <div class="position-relative">



                                                                    <textarea class="form-control" name="author" cols="2"
                                                                        rows="2">{{ $data->author }}</textarea>


                                                                </div>
                                                                @error('author')
                                                                    <div class="my-2">
                                                                        <span class="text-danger">{{ $message }}</span>
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-md-12">

                                                            <label>สถานะ</label>

                                                            <select class="form-select" name="status"
                                                                aria-label="Default select example">

                                                                <option {{ $data->status == '1' ? 'selected' : '' }}
                                                                    value="1">กำลังดำเนินการ</option>

                                                                <option {{ $data->status == '2' ? 'selected' : '' }}
                                                                    value="2">เสร็จสิ้นเเล้ว</option>

                                                            </select>
                                                            @error('status')
                                                                <div class="my-2">
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                </div>
                                                            @enderror
                                                        </div>

                                                        <div class="col-12 d-flex ">
                                                            <button type="submit"
                                                                class="btn btn-outline-success me-1 mt-5">บันทึก</button>

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
