@extends('layouts.backend')
@section('content')






    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>จัดการประเภทห้องพัก</h3>
                    {{-- <a class="btn btn-success m-3" href="{{ url()->previous() }}">ย้อนกลับ</a> --}}
                    <a class="btn btn-outline-primary m-3" href="{{ route('admin.room_type') }}">ย้อนกลับ</a>

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
                                        <h4 class="card-title">เเก้ไขข้อมูลประเภทห้องพัก</h4>
                                    </div>
                                    <div class="card-content">
                                        <div class="card-body">

                                            <form class="form form-horizontal" method="POST"
                                                action="{{ route('room_type.update', $room->id) }}"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-body">
                                                    <div class="row">




                                                        <label>ภาพปก</label>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <input type="hidden" name="old_image"
                                                                    value="{{ $room->image }}" id="">
                                                                <input class="form-control" type="file" name="image"
                                                                    id="image" style="display:none;"
                                                                    accept="image/png,image/jpeg">

                                                                <div class="mb-3">
                                                                    <img id="preview" class="img-fluid"
                                                                        src="{{ asset($room->image) }}" width="500"
                                                                        height="500">

                                                                </div>

                                                                <button onclick="return triggerFile();"
                                                                    class="btn btn-primary  mb-2">เลือกรูปภาพ</button>
                                                                @error('image')
                                                                    <div class="my-2">
                                                                        <span class="text-danger">{{ $message }}</span>
                                                                    </div>
                                                                @enderror
                                                            </div>


                                                        </div>

                                                        <label>ประเภทห้องพัก</label>

                                                        <div class="col-md-12">
                                                            <div class="form-group has-icon-left">
                                                                <div class="position-relative">
                                                                    <input type="text" class="form-control" name="name"
                                                                        placeholder="ชื่อประเภทห้อง" id="first-name-icon"
                                                                        value="{{ $room->name }}">
                                                                    <div class="form-control-icon">
                                                                        <i class="bi bi-house-door-fill"></i>

                                                                    </div>
                                                                </div>
                                                                @error('name')
                                                                    <div class="my-2">
                                                                        <span class="text-danger">{{ $message }}</span>
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </div>


                                                        <label>รายละเอียด</label>

                                                        <div class="col-md-12">
                                                            <div class="form-group ">
                                                                <div class="position-relative">

                                                                    <textarea name="detail" class="form-control" cols="3"
                                                                        rows="3"> {{ $room->detail }}</textarea>
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



                                                        <label>ค่าเช่า/เดือน</label>

                                                        <div class="col-md-12">
                                                            <div class="form-group has-icon-left">
                                                                <div class="position-relative">
                                                                    <input type="number" class="form-control" name="price"
                                                                        value="{{ $room->price }}">
                                                                    <div class="form-control-icon">
                                                                        <i class="bi bi-person"></i>
                                                                    </div>
                                                                </div>
                                                                @error('price')
                                                                    <div class="my-2">
                                                                        <span class="text-danger">{{ $message }}</span>
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </div>


                                                        <label>จ่ายล่วงหน้า</label>

                                                        <div class="col-md-12">
                                                            <div class="form-group has-icon-left">
                                                                <div class="position-relative">
                                                                    <input type="text" class="form-control"
                                                                        name="pay_first" value="{{ $room->pay_first }}">
                                                                    <div class="form-control-icon">
                                                                        <i class="bi bi-person"></i>
                                                                    </div>
                                                                </div>
                                                                @error('pay_first')
                                                                    <div class="my-2">
                                                                        <span class="text-danger">{{ $message }}</span>
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <label>ค่ามัดจำ</label>

                                                        <div class="col-md-12">
                                                            <div class="form-group has-icon-left">
                                                                <div class="position-relative">
                                                                    <input type="text" class="form-control" name="deposit"
                                                                        value="{{ $room->deposit }}">
                                                                    <div class="form-control-icon">
                                                                        <i class="bi bi-person"></i>
                                                                    </div>
                                                                </div>
                                                                @error('deposit')
                                                                    <div class="my-2">
                                                                        <span class="text-danger">{{ $message }}</span>
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </div>









                                                        <div class="col-12 d-flex justify-content-end">
                                                            <button type="submit"
                                                                class="btn btn-success me-1 mb-1">เพิ่ม</button>

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
    <script>
        function triggerFile() {

            $("#image").trigger("click");
            return false
        }

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#preview').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#image").change(function() {
            readURL(this);
        });
    </script>


@endsection
