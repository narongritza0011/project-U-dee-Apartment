@extends('layouts.backend')
@section('content')
    <div class="page-heading">
        <h3>หน้าหลัก</h3>

    </div>
    <p>ยินดีต้อนรับ คุณ {{ Auth::user()->name }}</p>
    <section class="row">
        <div class="col-12 col-lg-9">
            <div class="row">
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon purple">
                                        <i class="iconly-boldShow"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">ลูกค้าทั้งหมด</h6>

                                    <h6 class="font-extrabold mb-0">{{ $data }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



            </div>

    </section>
@endsection
@include('sweetalert::alert')
