@extends('layouts.backend')
@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <h3>ข่าวสาร</h3>
                <div class="col-12 col-md-6 order-md-1 order-last">


                </div>
                <div class="mb-3" align="right">


                    <button type="button" id="admin-add" class="btn btn-outline-primary block" data-bs-toggle="modal"
                        data-bs-target="#modal-albums">
                        เพิ่ม
                    </button>

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




    <!-- Modal -->
    <div class="modal fade" id="modal-albums" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ข้อมูลผู้เข้าพัก</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="col-12 col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title"></h5>
                            </div>
                            <div class="card-content">

                                <div class="card-body">
                                    <form class="form " method="POST" action="{{ route('new.store') }}">
                                        @csrf



                                        <div class="mb-3 ">
                                            <label for="exampleFormControlInput1" class="form-label">หัวข้อ</label>
                                            <input type="text" class="form-control" id="exampleFormControlInput1"
                                                name="title">
                                            @error('title')
                                                <div class="my-2">
                                                    <span class="text-danger">{{ $message }}</span>
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="mb-3 ">
                                            <label for="exampleFormControlInput1" class="form-label">รายละเอียด
                                            </label>

                                            <textarea name="detail" class="form-control" id="" cols="3"
                                                rows="3"></textarea>
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
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                    <button type="submit" class="btn btn-primary">บันทึก</button>
                </div>
                </form>
            </div>
        </div>
    </div>



    <section class="section">

        <div class="card">
            <div class="card-header">
                ตารางข้อมูลข่าวสาร
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>หัวข้อ</th>
                            <th>จัดการ</th>

                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($data as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>

                                <td>{{ $item->title }}</td>

                                <td>
                                    <a href="{{ route('new.edit', $item->id) }}" class="btn btn-outline-warning "><i
                                            class="bi bi-pencil-square"></i></a>
                                    <a href="{{ route('new.delete', $item->id) }}" class="btn btn-outline-danger "><i
                                            class="bi bi-trash"></i></a>
                                </td>

                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </section>

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
