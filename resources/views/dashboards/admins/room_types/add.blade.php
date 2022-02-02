@extends('layouts.backend')
@section('content')


    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <h3>จัดการประเภทห้องพัก
                </h3>
                <div class="mb-3" align="left">
                    <a href="{{ route('admin.room_type') }}" class="btn btn-outline-primary block">
                        ย้อนกลับ
                    </a>
                </div>
                <div class="col-12 col-md-6 order-md-1 order-last">

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

        <!-- Basic Horizontal form layout section start -->
        <section id="basic-horizontal-layouts">
            <div class="row match-height">
                <div class="col-12 ">
                    <div class="card">
                        <div class="card-header">

                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <section class="section">

                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">เพิ่มข้อมูลประเภทห้องพัก</h4>
                                        </div>
                                        <div class="card-content">
                                            <div class="card-body">

                                                <form class="form form-horizontal" method="POST"
                                                    action="{{ route('room_type.add') }}" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class=" form-body">
                                                        <div class="row">
                                                            <label>ภาพรูปปก</label>
                                                            <div class="col-md-12">
                                                                <div class="form-group">

                                                                    <input class="form-control" type="file" name="image"
                                                                        id="image" style="display:none;"
                                                                        accept="image/png,image/jpeg">

                                                                    <div class="mb-3">
                                                                        <img id="preview" class="img-fluid" width="300"
                                                                            height="300">

                                                                    </div>

                                                                    <button onclick="return triggerFile();"
                                                                        class="btn btn-primary  mb-2">เลือกรูปภาพ</button>
                                                                    @error('image')
                                                                        <div class="my-2">
                                                                            <span
                                                                                class="text-danger">{{ $message }}</span>
                                                                        </div>
                                                                    @enderror
                                                                </div>


                                                            </div>


                                                            <label>ประเภทห้องพัก</label>

                                                            <div class="col-md-12">
                                                                <div class="form-group has-icon-left">
                                                                    <div class="position-relative">
                                                                        <input type="text" class="form-control"
                                                                            name="name" placeholder="" id="first-name-icon">
                                                                        <div class="form-control-icon">
                                                                            <i class="bi bi-person"></i>
                                                                        </div>
                                                                    </div>
                                                                    @error('name')
                                                                        <div class="my-2">
                                                                            <span
                                                                                class="text-danger">{{ $message }}</span>
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </div>


                                                            <label>รายละเอียด</label>

                                                            <div class="col-md-12">
                                                                <div class="form-group has-icon-left">
                                                                    <div class="position-relative">
                                                                        <input type="text" class="form-control"
                                                                            name="detail">
                                                                        <div class="form-control-icon">
                                                                            <i class="bi bi-person"></i>
                                                                        </div>
                                                                    </div>
                                                                    @error('detail')
                                                                        <div class="my-2">
                                                                            <span
                                                                                class="text-danger">{{ $message }}</span>
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </div>



                                                            <label>ค่าเช่า/เดือน</label>

                                                            <div class="col-md-12">
                                                                <div class="form-group has-icon-left">
                                                                    <div class="position-relative">
                                                                        <input type="number" class="form-control"
                                                                            name="price">
                                                                        <div class="form-control-icon">
                                                                            <i class="bi bi-person"></i>
                                                                        </div>
                                                                    </div>
                                                                    @error('price')
                                                                        <div class="my-2">
                                                                            <span
                                                                                class="text-danger">{{ $message }}</span>
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </div>


                                                            <label>จ่ายล่วงหน้า</label>

                                                            <div class="col-md-12">
                                                                <div class="form-group has-icon-left">
                                                                    <div class="position-relative">
                                                                        <input type="number" class="form-control"
                                                                            name="pay_first">
                                                                        <div class="form-control-icon">
                                                                            <i class="bi bi-person"></i>
                                                                        </div>
                                                                    </div>
                                                                    @error('pay_first')
                                                                        <div class="my-2">
                                                                            <span
                                                                                class="text-danger">{{ $message }}</span>
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </div>

                                                            <label>ค่ามัดจำ</label>

                                                            <div class="col-md-12">
                                                                <div class="form-group has-icon-left">
                                                                    <div class="position-relative">
                                                                        <input type="number" class="form-control"
                                                                            name="deposit">
                                                                        <div class="form-control-icon">
                                                                            <i class="bi bi-person"></i>
                                                                        </div>
                                                                    </div>
                                                                    @error('deposit')
                                                                        <div class="my-2">
                                                                            <span
                                                                                class="text-danger">{{ $message }}</span>
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </div>









                                                            <div class="col-12 d-flex justify-content-end">
                                                                <button type="submit"
                                                                    class="btn btn-success me-1 mb-1">บันทึก</button>

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
