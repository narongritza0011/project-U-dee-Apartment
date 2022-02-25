@extends('layouts.user')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <h3>ค่าห้อง</h3>
                <div class="col-12 col-md-6 order-md-1 order-last">


                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">รายการ</a></li>
                            <li class="breadcrumb-item active" aria-current="page">ค่าห้อง</li>
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
                            <h4 class="card-title">รายการ</h4>
                        </div>
                        <div class="card-content">
                            
                        </div>
                    </div>
                </div>

            </div>
        </section>
        <!-- // Basic Horizontal form layout section end -->

    </div>
    @include('sweetalert::alert')
@endsection
