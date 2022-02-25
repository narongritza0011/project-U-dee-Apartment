@extends('layouts.backend')
@section('content')



    <!-- Disabled Backdrop Modal -->
    <div class="modal fade text-left" id="backdrop" tabindex="-1" role="dialog" aria-labelledby="myModalLabel4"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel33">ข้อมูลสมาชิก </h4>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i> <span aria-hidden="true">&times;</span>
                    </button>

                </div>
                <form action="{{ route('member.add') }}" method="POST" id="add-admin-form">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" class="form-control" name="id">
                        <label>ชื่อ-นามสกุล: </label>
                        <div class="form-group">
                            <input type="text" class="form-control" name="name">

                            @error('name')
                                <div class="my-2">
                                    <span class="text-danger">{{ $message }}</span>
                                </div>
                            @enderror
                        </div>
                        <label>อีเมล์: </label>
                        <div class="form-group">
                            <input type="email" class="form-control" name="email">

                            @error('email')
                                <div class="my-2">
                                    <span class="text-danger">{{ $message }}</span>
                                </div>
                            @enderror
                        </div>




                        <label>เบอร์ติดต่อ: </label>
                        <div class="form-group">
                            <input type="number" class="form-control" name="tel">

                            @error('tel')
                                <div class="my-2">
                                    <span class="text-danger">{{ $message }}</span>
                                </div>
                            @enderror
                        </div>
                        <label>รหัสผ่าน: </label>
                        <div class="form-group">
                            <input type="text" class="form-control" name="password">

                            @error('password')
                                <div class="my-2">
                                    <span class="text-danger">{{ $message }}</span>
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class=" d-sm-block">ปิด</span>
                        </button>
                        <button type="submit" class="btn btn-primary ml-1">
                            <i class="bx bx-check d-block d-sm-none"></i>
                            <span class="d-sm-block">บันทึก</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- {{ dd($errors->all()) }} --}}


    @include('sweetalert::alert')



    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <h3>ข้อมูลสมาชิก</h3>
                <div class="mb-3" align="right">
                    <button type="button" id="admin-add" class="btn btn-outline-primary block" data-bs-toggle="modal"
                        data-bs-backdrop="false" data-bs-target="#backdrop">
                        เพิ่มสมาชิก
                    </button>
                </div>
                <div class="col-12 col-md-6 order-md-1 order-last">

                    <!-- Button trigger for Disabled Backdrop -->


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


        <section class="section">

            <div class="card">
                <div class="card-header">
                    ตารางข้อมูลสมาชิก
                </div>
                <div class="card-body">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>ชื่อ</th>
                                <th>อีเมล์</th>
                                <th>เบอร์</th>
                                <th>จัดการ</th>

                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($user as $data)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{ $data->name }}</td>
                                    <td>{{ $data->email }}</td>
                                    <td>{{ $data->tel }}</td>
                                    <td><a href="#" admin-route="{{ route('admin.edit', $data->id) }}"
                                            class="btn btn-outline-warning edit-btn"><i class="bi bi-pencil-square"></i></a>
                                        <a href="{{ route('admin.delete', $data->id) }}"
                                            class="btn btn-outline-danger delete-btn"><i class="bi bi-trash"></i></a>
                                    </td>


                                </tr>
                            @endforeach



                        </tbody>
                    </table>
                </div>


            </div>







        </section>
    </div>










@endsection
@section('script')
    <script type="text/javascript">
        @if ($errors->all())
        
            $(window).on('load', function() {
            $('#backdrop').modal('show');
            });
        @endif

        $('#admin-add').on('click', function() {
            $('#add-admin-form').attr('action', '{{ route('member.add') }}')

            $('[name=id]').val('')
            $('[name=name]').val('')
            $('[name=email]').val('')
            $('[name=tel]').val('')
        })


        $('#table1 tbody').on('click', '.edit-btn', function() {
            // alert($(this).attr('admin-id'))

            $.ajax({
                type: 'get',
                url: $(this).attr('admin-route'),

                dataType: "json",
                contentType: false,
                processData: false,
                success: function(response) {
                    console.log(response);

                    if (response) {
                        $('#add-admin-form').attr('action', '{{ route('admin.update') }}')


                        $('[name=id]').val(response.id)
                        $('[name=name]').val(response.name)
                        $('[name=email]').val(response.email)
                        $('[name=tel]').val(response.tel)
                        $('#backdrop').modal('show');

                    } else {

                    }
                }
            });
        })
    </script>

@endsection
