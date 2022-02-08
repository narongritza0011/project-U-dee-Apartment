@extends('layouts.backend')
@section('content')






    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>จัดการข้อมูลผู้เข้าพัก
                    </h3>
                    {{-- <a class="btn btn-success m-3" href="{{ url()->previous() }}">ย้อนกลับ</a> --}}
                    <a class="btn btn-primary m-3" href="{{ route('roomer.all') }}">ย้อนกลับ</a>

                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">DataTable</li>
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
                                        <h4 class="card-title">เเก้ไขข้อมูลห้องพัก</h4>
                                    </div>
                                    <div class="card-content">
                                        <div class="card-body">

                                            <form class="form form-horizontal" method="POST"
                                                action="{{ route('roomer.update', $data->id) }}">
                                                @csrf
                                                <div class="form-body">
                                                    <label>เลขห้อง</label>

                                                    <div class="col-md-12">
                                                        <div class="form-group has-icon-left">

                                                            <fieldset class="form-group">
                                                                <select class="form-select" id="basicSelect"
                                                                    name="room_number">
                                                                    @foreach ($room as $rt)
                                                                        <option value="{{ $rt->id }}"
                                                                            {{ $data->room_number == $rt->id ? 'selected' : '' }}>
                                                                            {{ $rt->room_number }}</option>

                                                                    @endforeach
                                                                </select>
                                                                @error('room_number')
                                                                    <div class="my-2">
                                                                        <span class="text-danger">{{ $message }}</span>
                                                                    </div>
                                                                @enderror
                                                            </fieldset>


                                                        </div>

                                                    </div>


                                                    <div class="mb-3 ">
                                                        <label for="exampleFormControlInput1"
                                                            class="form-label">กรอกเลขบัตรประชาชน</label>
                                                        <input type="text" class="form-control"
                                                            id="exampleFormControlInput1" value="{{ $data->card_number }}"
                                                            name="card_number">
                                                        @error('card_number')
                                                            <div class="my-2">
                                                                <span class="text-danger">{{ $message }}</span>
                                                            </div>
                                                        @enderror
                                                    </div>
                                                    <div class="mb-3 ">
                                                        <label for="exampleFormControlInput1"
                                                            class="form-label">ชื่อ-นามสกุล
                                                        </label>
                                                        <input type="text" class="form-control"
                                                            id="exampleFormControlInput1" value="{{ $data->full_name }}"
                                                            name="full_name">
                                                        @error('full_name')
                                                            <div class="my-2">
                                                                <span class="text-danger">{{ $message }}</span>
                                                            </div>
                                                        @enderror
                                                    </div>
                                                    <div class="mb-3 ">
                                                        <label for="exampleFormControlInput1"
                                                            class="form-label">เบอร์โทร
                                                        </label>
                                                        <input type="number" class="form-control"
                                                            id="exampleFormControlInput1" value="{{ $data->tel }}"
                                                            name="tel">
                                                        @error('tel')
                                                            <div class="my-2">
                                                                <span class="text-danger">{{ $message }}</span>
                                                            </div>
                                                        @enderror
                                                    </div>


                                                    <div class="mb-3">
                                                        <label for="exampleFormControlTextarea1"
                                                            class="form-label">กรอกผู้ติดต่อกรณีฉุกเฉิน
                                                        </label>
                                                        <textarea class="form-control" id="exampleFormControlTextarea1"
                                                            rows="3"
                                                            name="contact_other">{{ $data->contact_other }}</textarea>

                                                        @error('contact_other')
                                                            <div class="my-2">
                                                                <span class="text-danger">{{ $message }}</span>
                                                            </div>
                                                        @enderror
                                                    </div>
                                                    <label>สถานะ</label>

                                                    <div class="col-md-12 mb-3">
                                                        <div class="form-group has-icon-left">

                                                            <fieldset class="form-group">
                                                                <select class="form-select" id="basicSelect"
                                                                    name="status">

                                                                    <option value="1"
                                                                        {{ $data->status == '1' ? 'selected' : '' }}>
                                                                        อาศัยอยู่</option>
                                                                    <option value="2"
                                                                        {{ $data->status == '2' ? 'selected' : '' }}>
                                                                        ย้ายออกเเล้ว</option>
                                                                    <option value="3"
                                                                        {{ $data->status == '3' ? 'selected' : '' }}>
                                                                        รอย้ายออก</option>






                                                                </select>
                                                                @error('status')
                                                                    <div class="my-2">
                                                                        <span class="text-danger">{{ $message }}</span>
                                                                    </div>
                                                                @enderror
                                                            </fieldset>


                                                        </div>

                                                    </div>

                                                    <div class="col-12">
                                                        <label>วันที่เข้าพัก</label>
                                                        <div class="input-group date" id="">
                                                            <input type="text" id="datepicker" class="form-control"
                                                                name="start_date" value="{{ $data->start_date }}">
                                                            <span class="input-group-append">
                                                                <span class="input-group-text bg-white d-block">
                                                                    <i class="fa fa-calendar"></i>
                                                                </span>
                                                            </span>
                                                        </div>
                                                        @error('start_date')
                                                            <div class="my-2">
                                                                <span class="text-danger">{{ $message }}</span>
                                                            </div>
                                                        @enderror
                                                    </div>



                                                </div>

                                                <div class="col-12 d-flex justify-content-end">
                                                    <button type="submit" class="btn btn-success me-1 mb-1">บันทึก</button>

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
@section('script')

    <script>
        @if ($errors->all())
        
            $(window).on('load', function() {
            $('#modal-albums').modal('show');
            });
        @endif


        $(document).ready(function() {
            // $('#datepicker').datepicker();
            $('#datepicker').datepicker({
                todayHighlight: true,
                autoclose: true,
                format: "dd/mm/yyyy",
            });
        });
    </script>
@endsection
