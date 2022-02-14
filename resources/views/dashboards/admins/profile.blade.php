@extends('layouts.backend')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <h3>บัญชีของฉัน</h3>
                <div class="col-12 col-md-6 order-md-1 order-last">


                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">บัญชีของฉัน</a></li>
                            <li class="breadcrumb-item active" aria-current="page">ข้อมูลส่วนตัว</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <!-- Basic Horizontal form layout section start -->
        <section id="basic-horizontal-layouts">
            <div class="row match-height">
                <div class="col-md-12 col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">ข้อมูลส่วนตัว</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form form-horizontal" method="post"
                                    action="{{ route('profile.update', Auth::user()->id) }}">
                                    <div class="form-body">
                                        <div class="row">

                                            <div class="col-md-4">
                                                <label>ชื่อ-นามสกุล</label>
                                            </div>

                                            <div class="col-md-8 form-group">
                                                <input type="text" value="{{ Auth::user()->name }}" id="first-name"
                                                    class="form-control" name="name" placeholder="First Name">
                                            </div>
                                            <div class="col-md-4">
                                                <label>อีเมล์</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="email" id="email-id" value="{{ Auth::user()->email }}"
                                                    class="form-control" name="email" readonly placeholder="Email">
                                            </div>
                                            <div class="col-md-4">
                                                <label>เบอร์ติดต่อ</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="number" id="contact-info" value="{{ Auth::user()->tel }}"
                                                    class="form-control" name="tel" placeholder="Mobile">
                                            </div>
                                            <div class="col-md-4">
                                                <label>รหัสผ่าน</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" class="form-control" name="password">
                                            </div>


                                            <div class="col-sm-12 d-flex justify-content-end">
                                                <button type="submit" class="btn btn-primary me-1 mb-1">บันทึก</button>

                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
        <!-- // Basic Horizontal form layout section end -->

    </div>
@endsection
