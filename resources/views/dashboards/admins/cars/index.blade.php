@extends('layouts.backend')
@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>จัดการข้อมูลรถ</h3>


                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">

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

                        ตารางข้อมูลรถ

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
                                                    <th>ชื่อ-นามสกุล</th>

                                                    <th>เบอร์ติดต่อ</th>

                                                    <th>เลขทะเบียน</th>
                                                    <th>สถานะ</th>
                                                    <th>วันที่ตรวจเช็ค</th>


                                                    <th>จัดการ</th>

                                                </tr>
                                            </thead>
                                            <tbody>

                                                @foreach ($data as $item)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $item->full_name }}</td>

                                                        <td>{{ $item->tel }}</td>

                                                        <td>{{ $item->number_car }}</td>
                                                        <td>
                                                            @if ($item->status == 1)
                                                                <span class="badge bg-warning">กำลังดำเนินการ</span>
                                                            @elseif($item->status == 2)
                                                                <span class="badge bg-success">เสร็จสิ้นเเล้ว</span>
                                                            @endif
                                                        </td>

                                                        <td><span class="badge bg-primary">{{ $item->check_date }}</span>
                                                        </td>



                                                        <td>
                                                            <a href="{{ route('cars.view', $item->id) }}"
                                                                class="btn btn-primary "><i class="bi bi-eye-fill"></i></a>
                                                            <a href="{{ route('cars.edit', $item->id) }}"
                                                                class="btn btn-warning "><i
                                                                    class="bi bi-pencil-square"></i></a>
                                                            <a href="{{ route('cars.delete', $item->id) }}"
                                                                class="btn btn-danger "><i class="bi bi-trash-fill"></i></a>
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
                        <h4 class="card-title">ข้อมูลรถ</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">

                            <form class="form form-horizontal" method="POST" action="{{ route('cars.store') }}">
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <label>ชื่อ-นามสกุล ลูกค้า</label>

                                        <div class="col-md-12">
                                            <div class="form-group ">
                                                <div class="position-relative">
                                                    <input type="text" class="form-control" name="full_name">

                                                </div>
                                                @error('full_name')
                                                    <div class="my-2">
                                                        <span class="text-danger">{{ $message }}</span>
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <label>เบอร์ติดต่อ</label>

                                        <div class="col-md-12">
                                            <div class="form-group ">
                                                <div class="position-relative">
                                                    <input type="text" class="form-control" name="tel">

                                                </div>
                                                @error('tel')
                                                    <div class="my-2">
                                                        <span class="text-danger">{{ $message }}</span>
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <label>ยี่ห้อ</label>

                                        <div class="col-md-12">
                                            <div class="form-group ">
                                                <div class="position-relative">
                                                    <input type="text" class="form-control" name="brand">

                                                </div>
                                                @error('brand')
                                                    <div class="my-2">
                                                        <span class="text-danger">{{ $message }}</span>
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <label>รุ่น</label>

                                        <div class="col-md-12">
                                            <div class="form-group ">
                                                <div class="position-relative">
                                                    <input type="text" class="form-control" name="model">

                                                </div>
                                                @error('model')
                                                    <div class="my-2">
                                                        <span class="text-danger">{{ $message }}</span>
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>


                                        <label>เลขทะเบียน</label>

                                        <div class="col-md-12">
                                            <div class="form-group ">
                                                <div class="position-relative">
                                                    <input type="text" class="form-control" name="number_car">

                                                </div>
                                                @error('number_car')
                                                    <div class="my-2">
                                                        <span class="text-danger">{{ $message }}</span>
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>


                                        <label>วันที่ตรวจเช็ค</label>

                                        <div class="col-md-12">
                                            <div class="form-group ">
                                                <div class="position-relative">
                                                    <input type="date" class="form-control" name="check_date">

                                                </div>
                                                @error('check_date')
                                                    <div class="my-2">
                                                        <span class="text-danger">{{ $message }}</span>
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <label>หมายเหตุ</label>

                                        <div class="col-md-12">
                                            <div class="form-group ">
                                                <div class="position-relative">



                                                    <textarea class="form-control" name="author" id="" cols="2" rows="2"></textarea>


                                                </div>
                                                @error('author')
                                                    <div class="my-2">
                                                        <span class="text-danger">{{ $message }}</span>
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>


                                        <div class="col-12 d-flex ">
                                            <button type="submit" class="btn btn-outline-success me-1 mt-3">เพิ่ม</button>

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
