@extends('layouts.backend')
@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>จัดการค่าน้ำค่าไฟ</h3>


                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="">ตาราง</a></li>
                            <li class="breadcrumb-item active" aria-current="page">ห้องพัก</li>
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

                        ตารางรายการห้องพัก

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
                                                    <th>ค่าไฟ</th>
                                                    <th>ค่าน้ำ</th>
                                                 
                                                    <th>สร้างเมื่อ</th>
                                                    <th>จัดการ</th>

                                                </tr>
                                            </thead>
                                            <tbody>

                                                @foreach ($data as $row)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $row->electricity }}</td>
                                                        <td>{{ $row->warter }}</td>

                                                        <td>{{ $row->created_at }}</td>
                                                        <td>
                                                            <a href="{{ route('elect_water.edit', $row->id) }}"
                                                                class="btn btn-outline-warning "><i
                                                                    class="bi bi-pencil-square"></i></a>
                                                            <a href="{{ route('elect_water.delete', $row->id) }}"
                                                                class="btn btn-outline-secondary disabled"><i
                                                                    class="bi bi-trash "></i></a>
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
                        <h4 class="card-title">ข้อมูลห้องพัก</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">

                            <form class="form form-horizontal" method="POST" action="{{ route('elect_water.add') }}">
                                @csrf
                                <div class="form-body">
                                    <div class="row">



                                        <label>ค่าน้ำ</label>

                                        <div class="col-md-12">
                                            <div class="form-group has-icon-left">
                                                <div class="position-relative">
                                                    <input type="text" class="form-control" name="warter" placeholder=""
                                                        id="first-name-icon">
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-list-ol"></i>
                                                    </div>
                                                </div>
                                                @error('warter')
                                                    <div class="my-2">
                                                        <span class="text-danger">{{ $message }}</span>
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <label>ค่าไฟ</label>

                                        <div class="col-md-12">
                                            <div class="form-group has-icon-left">
                                                <div class="position-relative">
                                                    <input type="text" class="form-control" name="electricity"
                                                        placeholder="" id="first-name-icon">
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-list-ol"></i>
                                                    </div>
                                                </div>
                                                @error('electricity')
                                                    <div class="my-2">
                                                        <span class="text-danger">{{ $message }}</span>
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>




                                        <div class="col-12 d-flex justify-content-end">
                                            <button disabled type="submit" class="btn btn-success me-1 mb-1">เพิ่ม</button>

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
