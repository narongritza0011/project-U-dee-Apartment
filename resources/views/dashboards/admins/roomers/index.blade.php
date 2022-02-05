@extends('layouts.backend')
@section('content')






    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <h3>จัดการข้อมูลผู้เข้าพัก
                </h3>

                <div class="mb-3" align="right">


                    <button type="button" id="admin-add" class="btn btn-outline-primary block" data-bs-toggle="modal"
                        data-bs-target="#modal-albums">
                        เพิ่ม
                    </button>

                </div>


                <!-- Modal -->
                <div class="modal fade" id="modal-albums" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">ข้อมูลผู้เข้าพัก</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">

                                <div class="col-12 col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="card-title"></h5>
                                        </div>
                                        <div class="card-content">

                                            <div class="card-body">
                                                <form class="form " method="POST"
                                                    action="{{ route('roomer.store') }}" enctype="multipart/form-data">
                                                    @csrf

                                                    <label>เลขห้อง</label>

                                                    <div class="col-md-12">
                                                        <div class="form-group has-icon-left">

                                                            <fieldset class="form-group">
                                                                <select class="form-select" id="basicSelect"
                                                                    name="room_number">
                                                                    <option disabled selected>กรุณาเลือก</option>
                                                                    @foreach ($data as $room)

                                                                        <option value="{{ $room->room_number }}">
                                                                            {{ $room->room_number }}</option>
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
                                                            id="exampleFormControlInput1" name="card_number">
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
                                                            id="exampleFormControlInput1" name="full_name">
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
                                                            id="exampleFormControlInput1" name="tel">
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
                                                            rows="3" name="contact_other"></textarea>

                                                        @error('contact_other')
                                                            <div class="my-2">
                                                                <span class="text-danger">{{ $message }}</span>
                                                            </div>
                                                        @enderror
                                                    </div>


                                                    <div class="col-12">
                                                        <label>วันที่เข้าพัก</label>
                                                        <div class="input-group date" id="">
                                                            <input type="text" id="datepicker" class="form-control"
                                                                name="start_date">
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
                                        </div>
                                    </div>
                                </div>


                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                                <button type="submit" class="btn btn-primary">บันทึก</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>




                <div class="col-12 col-md-6 order-md-1 order-last">

                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">ตาราง</a></li>
                            <li class="breadcrumb-item active" aria-current="page">ข้อมูลผู้เข้าพัก</li>
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

                            ตารางข้อมูลผู้เข้าพัก

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
                                                        <th>เลขห้อง</th>
                                                        <th>เลขบัตรประชาชน</th>
                                                        <th>ชื่อ-นามสกุล</th>
                                                        <th>เบอร์ติดต่อ</th>
                                                        <th>จัดการ</th>

                                                    </tr>
                                                </thead>
                                                <tbody>


                                                    @foreach ($roomers as $item)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>

                                                            <td>{{ $item->room_number }}</td>
                                                            <td>{{ $item->card_number }}</td>
                                                            <td>{{ $item->full_name }}</td>
                                                            <td>{{ $item->tel }}</td>
                                                            <td>
                                                                <a href="{{ route('roomer.edit', $item->id) }}"
                                                                    class="btn btn-outline-warning"><i
                                                                        class="bi bi-pencil-square"></i></a>
                                                                <a href="{{ route('roomer.delete', $item->id) }}"
                                                                    class="btn btn-outline-danger "><i
                                                                        class="bi bi-trash"></i></a>
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
