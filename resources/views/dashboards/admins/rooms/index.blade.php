@extends('layouts.backend')
@section('content')






    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>จัดการห้องพัก</h3>


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
                                                    <th>ประเภท</th>
                                                    <th>เลขห้อง</th>
                                                    <th>สถานะ</th>
                                                    <th>สร้างเมื่อ</th>
                                                    <th>จัดการ</th>

                                                </tr>
                                            </thead>
                                            <tbody>

                                                @foreach ($room as $data)
                                                    <tr>
                                                        <td>{{ $data->id }}</td>
                                                        <td>{{ $data->name }}</td>
                                                        <td>{{ $data->room_number }}</td>

                                                        <td>
                                                            @if ($data->status == 1)
                                                                <span class="badge bg-success">ว่างให้เช่า</span>
                                                            @elseif ($data->status == 2)
                                                                <span class="badge bg-warning">มีผู้เช่าเเล้ว</span>
                                                            @elseif ($data->status == 3)
                                                                <span class="badge bg-danger">ซ่อมเเซม</span>
                                                            @endif

                                                        </td>


                                                        <td class="text-success">{{ $data->created_at }}</td>
                                                        <td>
                                                            <a href="{{ route('room.edit', $data->id) }}"
                                                                class="btn btn-outline-warning "><i
                                                                    class="bi bi-pencil-square"></i></a>
                                                            <a href="{{ route('room.delete', $data->id) }}"
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
                        <h4 class="card-title">ข้อมูลห้องพัก</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">

                            <form class="form form-horizontal" method="POST" action="{{ route('room.add') }}">
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <label>ประเภทห้องพัก</label>

                                        <div class="col-md-12">
                                            <div class="form-group has-icon-left">

                                                <fieldset class="form-group">
                                                    <select class="form-select" id="basicSelect" name="room_type">
                                                        @foreach ($room_type as $data)
                                                            <option value="{{ $data->id }}">{{ $data->name }}</option>

                                                        @endforeach



                                                    </select>



                                                    @error('room_type')
                                                        <div class="my-2">
                                                            <span class="text-danger">{{ $message }}</span>
                                                        </div>
                                                    @enderror
                                                </fieldset>
                                            </div>
                                        </div>
                                        <label>เลขห้อง</label>

                                        <div class="col-md-12">
                                            <div class="form-group has-icon-left">
                                                <div class="position-relative">
                                                    <input type="text" class="form-control" name="room_number"
                                                        placeholder="" id="first-name-icon">
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-list-ol"></i>
                                                    </div>
                                                </div>
                                                @error('room_number')
                                                    <div class="my-2">
                                                        <span class="text-danger">{{ $message }}</span>
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <label>สถานะ</label>

                                        <div class="col-md-12">
                                            <div class="form-group has-icon-left">
                                                <fieldset class="form-group">
                                                    <select class="form-select" id="basicSelect" name="status">
                                                        <option value="1">ว่างให้เช่า</option>
                                                        <option value="2">มีผู้เช่าเเล้ว</option>
                                                        <option value="3">ซ่อมเเซม</option>

                                                    </select>
                                                    @error('status')
                                                        <div class="my-2">
                                                            <span class="text-danger">{{ $message }}</span>
                                                        </div>
                                                    @enderror
                                            </div>



                                            </fieldset>


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
