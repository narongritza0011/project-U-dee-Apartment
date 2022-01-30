@extends('layouts.backend')
@section('content')






    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>จัดการประเภทห้องพัก</h3>


                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="">ตาราง</a></li>
                            <li class="breadcrumb-item active" aria-current="page">ประเภทห้องพัก</li>
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

                        ตารางข้อมูลประเภทห้องพัก

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
                                                    <th>ชื่อประเภท</th>
                                                    <th>สร้างเมื่อ</th>
                                                    <th>จัดการ</th>

                                                </tr>
                                            </thead>
                                            <tbody>

                                                @foreach ($room as $data)
                                                    <tr>
                                                        <td>{{ $data->id }}</td>
                                                        <td>{{ $data->name }}</td>
                                                        <td>{{ $data->created_at }}</td>
                                                        <td>
                                                            <a href="{{ route('room_type.edit', $data->id) }}"
                                                                class="btn btn-outline-warning "><i
                                                                    class="bi bi-pencil-square"></i></a>
                                                            <a href="{{ route('room_type.delete', $data->id) }}"
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
            <div class="col-sm-12 col-md-4 col-lg-3  col-xl-3">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">ข้อมูลประเภท</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">

                            <form class="form form-horizontal" method="POST" action="{{ route('room_type.add') }}">
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <label>ประเภทห้องพัก</label>

                                        <div class="col-md-12">
                                            <div class="form-group has-icon-left">
                                                <div class="position-relative">
                                                    <input type="text" class="form-control" name="name"
                                                        placeholder="ชื่อประเภทห้อง" id="first-name-icon">
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-person"></i>
                                                    </div>
                                                </div>
                                                @error('name')
                                                    <div class="my-2">
                                                        <span class="text-danger">{{ $message }}</span>
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-success me-1 mb-1">เพิ่ม</button>

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

    @include('sweetalert::alert')




@endsection
