@extends('layouts.backend')
@section('content')






    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <h3>จัดการอัลบั้มรูปภาพ
                </h3>
                <div class="mb-3" align="left">
                    <a href="{{ route('admin.room_type') }}" class="btn btn-outline-primary block">
                        ย้อนกลับ
                    </a>
                </div>
                <div class="mb-3" align="right">


                    <button type="button" class="btn btn-outline-primary block" data-bs-toggle="modal"
                        data-bs-target="#modal-albums">
                        เพิ่ม
                    </button>




                    <!-- Modal -->
                    <div class="modal fade" id="modal-albums" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">อัพโหลดอัลบั้ม</h5>
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
                                                    <form class="form form-horizontal" method="POST"
                                                        action="{{ route('album.add') }}" enctype="multipart/form-data">
                                                        @csrf
                                                        <!-- File uploader with multiple files upload -->

                                                        <input type="hidden" value="{{ $data->id }}"
                                                            class="form-control" name="room_type">

                                                        <input type="file" class="form-control" name="name[]"
                                                            accept="image/png,image/jpeg" multiple>
                                                        @error('name')
                                                            <div class="my-2">
                                                                <span class="text-danger">{{ $message }}</span>
                                                            </div>
                                                        @enderror
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



                </div>
                <div class="col-12 col-md-6 order-md-1 order-last">

                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                           
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

                            ตารางอัลบั้มรูปภาพ

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
                                                        <th>รูปภาพ</th>
                                                        <th>จัดการ</th>

                                                    </tr>
                                                </thead>
                                                <tbody>


                                                    @foreach ($albums as $row)
                                                        <tr>
                                                            <td>{{$loop->iteration}}</td>
                                                            <td><img class="img-fluid" src="{{ asset($row->name) }}"
                                                                    height="100" width="200" alt=""></td>



                                                            <td>

                                                                <a href="{{ route('album.delete', $row->id) }}"
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
        </script>
    @endsection
