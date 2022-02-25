@extends('layouts.backend')
@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <h3>ออกบิลค่าเช่าห้อง
                </h3>









                <div class="col-12 col-md-6 order-md-1 order-last">
                    <a class="btn btn-primary m-3" href="{{ route('admin.dashboard') }}">ย้อนกลับ</a>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">ตาราง</a></li>
                            <li class="breadcrumb-item active" aria-current="page">ข้อมูลผู้เข้าพัก</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>


        <!-- ฟอร์มออกบิลค่าเช่า -->
        <section id="basic-horizontal-layouts">
            <div class="row match-height">
                <div class="col-md-12 col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">ข้อมูลส่วนตัว</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form form-horizontal" method="post" action="{{ route('bill.add') }}">
                                    @csrf
                                    <div class="form-body">
                                        <div class="row">

                                            <div class="col-md-4">
                                                <label>เลขห้อง</label>
                                            </div>

                                            <div class="col-md-8 form-group">

                                                <select name="room_number" class="form-control" id="">
                                                    <option selected value="{{ $room->id }}">{{ $room->room_number }}
                                                    </option>
                                                </select>

                                                @error('room_number')
                                                    <div class="my-2">
                                                        <span class="text-danger">{{ $message }}</span>
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="col-md-4">
                                                <label>รอบบิล/เดือน</label>
                                            </div>

                                            <div class="col-md-8 form-group">
                                                <select class="form-select" name="bill"
                                                    aria-label="Default select example">
                                                    <option selected disabled>เลือกรอบบิล</option>
                                                    <option value="มกราคม {{ $year }}">มกราคม {{ $year }}
                                                    </option>
                                                    <option value="กุมภาพันธ์ {{ $year }}">กุมภาพันธ์
                                                        {{ $year }}
                                                    </option>
                                                    <option value="มีนาคม {{ $year }}">มีนาคม {{ $year }}
                                                    </option>
                                                    <option value="เมษายน {{ $year }}">เมษายน {{ $year }}
                                                    </option>
                                                    <option value="พฤษภาคม {{ $year }}">พฤษภาคม
                                                        {{ $year }}
                                                    </option>
                                                    <option value="มิถุนายน {{ $year }}">มิถุนายน
                                                        {{ $year }}
                                                    </option>
                                                    <option value="กรกฎาคม {{ $year }}">กรกฎาคม
                                                        {{ $year }}
                                                    </option>
                                                    <option value="สิงหาคม {{ $year }}">สิงหาคม
                                                        {{ $year }}
                                                    </option>
                                                    <option value="กันยายน {{ $year }}">กันยายน
                                                        {{ $year }}
                                                    </option>
                                                    <option value="ตุลาคม {{ $year }}">ตุลาคม {{ $year }}
                                                    </option>
                                                    <option value="พฤศจิกายน {{ $year }}">พฤศจิกายน
                                                        {{ $year }}
                                                    </option>
                                                    <option value="ธันวาคม {{ $year }}">ธันวาคม
                                                        {{ $year }}
                                                    </option>
                                                </select>
                                                @error('bill')
                                                    <div class="my-2">
                                                        <span class="text-danger">{{ $message }}</span>
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="col-md-4">
                                                <label>ค่าห้อง</label>
                                            </div>

                                            <div class="col-md-8 form-group">
                                                <input type="text" value="{{ $room->price }}" readonly id="room"
                                                    class="form-control" name="rental_fee">
                                                @error('rental_fee')
                                                    <div class="my-2">
                                                        <span class="text-danger">{{ $message }}</span>
                                                    </div>
                                                @enderror
                                            </div>



                                            <div class="row">
                                                <div class="col-md-2">
                                                    <label>ค่าน้ำ</label>
                                                </div>
                                                <div class="col-2 form-group">
                                                    <label>เลขมิเตอร์ครั้งนี้</label>

                                                    <input type="number"
                                                        @if ($widget == null) min="0"
                                                    @else

                                                    min="{{ old('water_now_meter', $widget->water_now_meter + 1 ?: null) }}" @endif
                                                        max="" id="wnow1" onkeyup="sum()" value="" class="form-control prc"
                                                        name="water_now_meter">




                                                    @error('water_now_meter')
                                                        <div class="my-2">
                                                            <span class="text-danger">{{ $message }}</span>
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="col-2 form-group">
                                                    <label>ครั้งก่อน</label>





                                                    <input type="text"
                                                        @if ($widget == null) value="0" 
                                                        @else
                                                        value="{{ $widget->water_now_meter }}" @endif
                                                        id="wold2" name="water_old_meter" readonly class="form-control prc">
                                                    @error('water_old_meter')
                                                        <div class="my-2">
                                                            <span class="text-danger">{{ $message }}</span>
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="col-2 form-group">
                                                    <label>หน่วยที่ใช้</label>

                                                    <input type="text" value="" readonly id="wunitresult"
                                                        class="form-control" name="water_unit">
                                                    @error('water_unit')
                                                        <div class="my-2">
                                                            <span class="text-danger">{{ $message }}</span>
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="col-2 form-group">
                                                    @foreach ($water_electric as $water)
                                                        <label>
                                                            ราคา/หน่วย</label>

                                                        <input type="text" value="{{ $water->warter }}" readonly
                                                            id="Wsum" class="form-control" name="water">
                                                        @error('water')
                                                            <div class="my-2">
                                                                <span class="text-danger">{{ $message }}</span>
                                                            </div>
                                                        @enderror
                                                    @endforeach
                                                </div>
                                                <div class="col-2 form-group">
                                                    <label>รวม(บาท)</label>

                                                    <input type="text" value="" readonly class="form-control" id="totalW"
                                                        name="water_sum">
                                                    @error('water_sum')
                                                        <div class="my-2">
                                                            <span class="text-danger">{{ $message }}</span>
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <label>ค่าไฟ</label>
                                                </div>
                                                <div class="col-2 form-group">
                                                    <label>เลขมิเตอร์ครั้งนี้</label>

                                                    <input type="number"
                                                        @if ($widget == null) min="0"
                                                @else
                                                    min="{{ $widget->electric_now_meter + 1 }}" @endif
                                                        onkeyup="sum()" max="" value="" id="enow1" class="form-control"
                                                        name="electric_now_meter">
                                                    @error('electric_now_meter')
                                                        <div class="my-2">
                                                            <span class="text-danger">{{ $message }}</span>
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="col-2 form-group">
                                                    <label>ครั้งก่อน</label>

                                                    <input type="number"
                                                        @if ($widget == null) value="0" 
                                                    @else
                                                    value="{{ $widget->electric_now_meter }}" @endif
                                                        id="eold2" readonly class="form-control"
                                                        name="electric_old_meter">


                                                    @error('electric_old_meter')
                                                        <div class="my-2">
                                                            <span class="text-danger">{{ $message }}</span>
                                                        </div>
                                                    @enderror
                                                </div>
                                                @foreach ($water_electric as $water)
                                                    <div class="col-2 form-group">
                                                        <label>หน่วยที่ใช้</label>

                                                        <input type="number" value="" readonly class="form-control"
                                                            name="electric_unit" id="unitresult">
                                                        @error('electric_unit')
                                                            <div class="my-2">
                                                                <span class="text-danger">{{ $message }}</span>
                                                            </div>
                                                        @enderror
                                                    </div>
                                                    <div class="col-2 form-group">

                                                        <label>
                                                            ราคา/หน่วย</label>

                                                        <input type="text" value="{{ $water->electricity }}" readonly
                                                            id="esum" class="form-control" name="electric">
                                                        @error('electric')
                                                            <div class="my-2">
                                                                <span class="text-danger">{{ $message }}</span>
                                                            </div>
                                                        @enderror
                                                @endforeach
                                            </div>
                                            <div class="col-2 form-group">
                                                <label>รวม(บาท)</label>

                                                <input type="text" value="" readonly class="form-control" id="totalE"
                                                    name="electric_sum">
                                                @error('electric_sum')
                                                    <div class="my-2">
                                                        <span class="text-danger">{{ $message }}</span>
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <label>รวมทั้งสิ้น</label>
                                        </div>

                                        <div class="col-md-8 form-group">
                                            <input type="text" value="" readonly class="form-control" name="total"
                                                id="totalall">
                                            @error('total')
                                                <div class="my-2">
                                                    <span class="text-danger">{{ $message }}</span>
                                                </div>
                                            @enderror
                                        </div>


                                        <div class="col-sm-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-1 mb-1">บันทึก</button>

                                        </div>
                                    </div>
                            </div>
                            </form>
                            {{-- <button onchange="sum()">Try it</button> --}}
                        </div>
                    </div>
                </div>
            </div>

    </div>
    </section>
    <!-- // ฟอร์มออกบิลค่าเช่า -->




    <!-- Basic Horizontal form layout section start -->
    <section id="basic-horizontal-layouts">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">

                        ตารางข้อมูลรายการบิลผู้เช่า

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
                                                    <th>รอบบิล</th>
                                                    <th>ค่าเช่า</th>
                                                    <th>รวม(น้ำ)</th>
                                                    <th>รวม(ไฟ)</th>
                                                    <th>รวม</th>
                                                    <th>สถานะ</th>
                                                    <th>จัดการ</th>

                                                </tr>
                                            </thead>
                                            <tbody>

                                                @foreach ($table_bill as $tbill)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>

                                                        <td>{{ $tbill->bill }}</td>
                                                        <td>{{ $tbill->rental_fee }}</td>
                                                        <td>{{ $tbill->water_sum }}</td>
                                                        <td>{{ $tbill->electric_sum }}</td>
                                                        <td>{{ $tbill->total }}</td>
                                                        <td>
                                                            @if ($tbill->status == 1)
                                                                <span class="badge  bg-warning">ยังไม่ชำระเงิน</span>
                                                            @elseif($tbill->status == 2)
                                                                <span class="badge bg-success">ชำระเงินเเล้ว</span>
                                                            @endif
                                                        </td>

                                                        <td>

                                                            <a href="{{ route('bill.print', $tbill->id) }}"
                                                                class="btn btn-outline-primary"><i
                                                                    class="bi bi-printer-fill"></i></a>
                                                            <a href="{{ route('bill.edit', $tbill->id) }}"
                                                                class="btn btn-outline-warning"><i
                                                                    class="bi bi-pencil-square"></i></a>
                                                            <a href="{{ route('bill.delete', $tbill->id) }}"
                                                                class="btn btn-outline-danger"><i
                                                                    class="bi bi-trash-fill"></i></a>

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

    {{-- n1 <input type="number" id="n1" value=15 />
    n2 <input type="number" id="n2" value=20 /> --}}


    {{-- <p id="demo2">Result?? </p> --}}

    @include('sweetalert::alert')
    <script type="text/javascript">
        function sum() {
            var enow, eold;
            enow = document.getElementById("enow1").value;
            eold = document.getElementById("eold2").value;
            resultunit = (parseFloat(enow) - parseFloat(eold));
            document.getElementById("unitresult").value = resultunit;

            var Eunit, Esum;
            Eunit = document.getElementById("unitresult").value;
            Esum = document.getElementById("esum").value;
            eResultSum = (parseFloat(Eunit) * parseFloat(Esum));
            document.getElementById("totalE").value = eResultSum;


            var wnow, wold;
            wnow = document.getElementById("wnow1").value;
            wold = document.getElementById("wold2").value;
            wresult = (parseFloat(wnow) - parseFloat(wold));
            document.getElementById("wunitresult").value = wresult;




            var Wunit, Wsum;
            Wunit = document.getElementById("wunitresult").value;
            Wsum = document.getElementById("Wsum").value;
            wResultSum = (parseFloat(Wunit) * parseFloat(Wsum));
            document.getElementById("totalW").value = wResultSum;


            var Wtotal, Etotal, room
            room = document.getElementById("room").value

            Wtotal = document.getElementById("totalW").value
            Etotal = document.getElementById("totalE").value
            totalsum = (parseFloat(Wtotal) + parseFloat(Etotal) + parseFloat(room));

            document.getElementById("totalall").value = totalsum;


        }
    </script>
@endsection
