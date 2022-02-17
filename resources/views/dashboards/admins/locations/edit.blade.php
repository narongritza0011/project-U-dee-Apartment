@extends('layouts.backend')
@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>ข้อมูลเกี่ยวกับ</h3>
                    {{-- <a class="btn btn-success m-3" href="{{ url()->previous() }}">ย้อนกลับ</a> --}}
                    <a class="btn btn-outline-primary m-3" href="{{ route('admin.contact') }}">ย้อนกลับ</a>

                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">ตาราง</a></li>
                            <li class="breadcrumb-item active" aria-current="page">ข่าวสาร</li>
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
                                        <h4 class="card-title">เเก้ไขข้อมูลเกี่ยวกับ</h4>
                                    </div>
                                    <div class="card-content">
                                        <div class="card-body">


                                            <div class="form-body">
                                                <div class="row">
                                                    <form action="{{ route('location.update', $data->id) }}"
                                                        method="POST">

                                                        @csrf
                                                        <label>เกี่ยวกับ</label>

                                                        <div class="col-md-12">
                                                            <div class="form-group ">
                                                                <div class="position-relative">

                                                                    <textarea name="about" class="form-control" cols="3"
                                                                        rows="3"> {{ $data->about }}</textarea>
                                                                    <div class="form-control-icon">

                                                                    </div>
                                                                </div>
                                                                @error('about')
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

                                                                    <input name="tel" type="number"
                                                                        value="{{ $data->tel }}" class="form-control">
                                                                    </input>
                                                                    <div class="form-control-icon">

                                                                    </div>
                                                                </div>
                                                                @error('tel')
                                                                    <div class="my-2">
                                                                        <span class="text-danger">{{ $message }}</span>
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </div>


                                                        <label>อีเมล์</label>

                                                        <div class="col-md-12">
                                                            <div class="form-group ">
                                                                <div class="position-relative">

                                                                    <input name="email" type="text"
                                                                        value="{{ $data->email }}" class="form-control">
                                                                    </input>
                                                                    <div class="form-control-icon">

                                                                    </div>
                                                                </div>
                                                                @error('email')
                                                                    <div class="my-2">
                                                                        <span class="text-danger">{{ $message }}</span>
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </div>


                                                        <label>ชื่อ facebook</label>

                                                        <div class="col-md-12">
                                                            <div class="form-group ">
                                                                <div class="position-relative">

                                                                    <input name="facebook_name" type="text"
                                                                        value="{{ $data->facebook_name }}"
                                                                        class="form-control">
                                                                    </input>
                                                                    <div class="form-control-icon">

                                                                    </div>
                                                                </div>
                                                                @error('facebook_name')
                                                                    <div class="my-2">
                                                                        <span class="text-danger">{{ $message }}</span>
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <label>ลิ้งเพจ facebook</label>

                                                        <div class="col-md-12">
                                                            <div class="form-group ">
                                                                <div class="position-relative">

                                                                    <textarea name="facebook_link" class="form-control"
                                                                        cols="3"
                                                                        rows="3"> {{ $data->facebook_link }}</textarea>
                                                                    <div class="form-control-icon">

                                                                    </div>
                                                                </div>
                                                                @error('facebook_link')
                                                                    <div class="my-2">
                                                                        <span class="text-danger">{{ $message }}</span>
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <label>ลิ้ง Instagram </label>

                                                        <div class="col-md-12">
                                                            <div class="form-group ">
                                                                <div class="position-relative">

                                                                    <textarea name="ig_link" class="form-control" cols="3"
                                                                        rows="3"> {{ $data->ig_link }}</textarea>
                                                                    <div class="form-control-icon">

                                                                    </div>
                                                                </div>
                                                                @error('ig_link')
                                                                    <div class="my-2">
                                                                        <span class="text-danger">{{ $message }}</span>
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <label>Map </label>

                                                        <div class="col-md-12">
                                                            <div class="form-group ">
                                                                <div class="position-relative">

                                                                    <textarea name="map" class="form-control" cols="3"
                                                                        rows="3"> {{ $data->map }}</textarea>
                                                                    <div class="form-control-icon">

                                                                    </div>
                                                                </div>
                                                                @error('map')
                                                                    <div class="my-2">
                                                                        <span class="text-danger">{{ $message }}</span>
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </div>






                                                        <button class="btn btn-success" type="submit">บันทึก</button>
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
