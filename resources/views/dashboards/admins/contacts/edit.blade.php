@extends('layouts.backend')
@section('content')






    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>ดูข้อความ</h3>
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
                                        <h4 class="card-title">ข้อความ</h4>
                                    </div>
                                    <div class="card-content">
                                        <div class="card-body">


                                            <div class="form-body">
                                                <div class="row">


                                                    <label>รายละเอียด</label>

                                                    <div class="col-md-12">
                                                        <div class="form-group ">
                                                            <div class="position-relative">

                                                                <textarea name="detail" readonly class="form-control"
                                                                    cols="3" rows="3"> {{ $data->message }}</textarea>
                                                                <div class="form-control-icon">

                                                                </div>
                                                            </div>
                                                            @error('detail')
                                                                <div class="my-2">
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                </div>
                                                            @enderror
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

    @include('sweetalert::alert')



@endsection
