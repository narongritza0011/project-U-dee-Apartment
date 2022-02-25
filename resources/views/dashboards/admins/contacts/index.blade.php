@extends('layouts.backend')
@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <h3>จัดการข้อความ</h3>
                <div class="col-12 col-md-6 order-md-1 order-last">


                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="">ตาราง</a></li>
                            <li class="breadcrumb-item active" aria-current="page">ข้อความ</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

    </div>




    <section class="section">

        <div class="card">
            <div class="card-header">
                ตารางข้อมูลข้อความ
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>ชื่อ-นามสกุล</th>
                            <th>อีเมล์</th>
                            <th>เบอร์ติดต่อ</th>
                            
                            <th>จัดการ</th>

                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($data as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>

                                <td>{{ $item->full_name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->tel }}</td>

                                <td>
                                    <a href="{{ route('contact.view', $item->id) }}" class="btn btn-outline-primary "><i
                                            class="bi bi-eye-fill"></i></a>
                                    <a href="{{ route('contact.delete', $item->id) }}" class="btn btn-outline-danger "><i
                                            class="bi bi-trash"></i></a>
                                </td>

                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
        @include('sweetalert::alert')
    </section>
@endsection
