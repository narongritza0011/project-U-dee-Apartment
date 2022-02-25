@extends('layouts.backend')
@section('content')
    <div class="page-heading">
        <h3>หน้าหลัก</h3>

    </div>
    <p>
    <h3>ผู้ดูเเลระบบ</h3> ยินดีต้อนรับ คุณ <strong>{{ Auth::user()->name }}</strong></p>
    <section class="row">
        <div class="col-12 col-lg-12">
            <div class="row">
                @foreach ($room as $r)
                    <div class="col-6 col-lg-3 col-md-6">
                        <a href="{{ route('admin.dashboard.bill', $r->id) }}">
                            <div class="card">



                                <div class="card-body px-3 py-4-5">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="stats-icon purple">
                                                <i class="iconly-boldHome
                                        "></i>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <h6 class="text-muted font-semibold">เลขห้อง</h6>

                                            <h6 class="font-extrabold mb-0">{{ $r->room_number }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach


            </div>


            


            <div class="row">

                <div class="col-12">

                    <div class="card">
                        <div class="card-header">
                            <h4>View</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">

                                <div class="col-6 col-lg-3 col-md-6">
                
                                    <div class="card bg-dark">
                                        <div class="card-body px-3 py-4-5">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="stats-icon green">
                                                        <i class="iconly-boldBookmark"></i>
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <h6 class="text-muted font-semibold">รายได้รวมทั้งหมด</h6>
                
                                                    <h6 class="font-extrabold mb-0 text-success ">
                                                        {{ number_format($total_income, 2) }}</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                
                                </div>
                                <div class="col-6 col-lg-3 col-md-6">
                
                                    <div class="card bg-dark">
                                        <div class="card-body px-3 py-4-5">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="stats-icon green">
                                                        <i class="iconly-boldBookmark"></i>
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <h6 class="text-muted font-semibold">ยังไม่ได้ชำระเงินรวม</h6>
                
                                                    <h6 class="font-extrabold mb-0 text-danger ">
                                                        {{ number_format($total_nopay_income, 2) }}</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                
                                </div>
                
                
                            </div>


                            {{-- <div id="chart-profile-visit"></div> --}}
                        </div>
                    </div>
                </div>
            </div>


        </div>

    </section>
@include('sweetalert::alert')

@endsection
