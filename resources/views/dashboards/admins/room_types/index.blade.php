@extends('layouts.backend')
@section('content')






    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <h3>จัดการประเภทห้องพัก
                </h3>
                <div class="mb-3" align="right">
                    <a href="{{ route('admin.add.form') }}" class="btn btn-outline-primary block">
                        เพิ่มข้อมูล
                    </a>
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
                                                        <th>รูปภาพ</th>
                                                        <th>ประเภท</th>
                                                        <th>ค่าเช่า/เดือน</th>
                                                        <th>ล่วงหน้า</th>
                                                        <th>มัดจำ</th>

                                                        <th>อัลบั้ม</th>
                                                        <th>จัดการ</th>

                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    @foreach ($room as $data)
                                                        <tr>
                                                            <td>{{$loop->iteration}}</td>
                                                            <td><img src="{{ asset($data->image) }}" height="100"
                                                                    width="100" alt=""></td>
                                                            <td>{{ $data->name }}</td>

                                                            <td>
                                                                <span class="badge bg-success">{{ $data->price }}</span>
                                                            </td>
                                                            <td>{{ $data->pay_first }}</td>
                                                            <td>{{ $data->deposit }}</td>

                                                            <td><a href="{{route('admin.get.image.all',$data->id)}}" class="btn btn-primary">
                                                                    <i class="bi bi-images"></i>
                                                                </a></td>

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

            </div>
        </section>
        <!-- // Basic Horizontal form layout section end -->




        @include('sweetalert::alert')




    @endsection
