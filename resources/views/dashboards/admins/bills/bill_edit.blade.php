@extends('layouts.backend')
@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <h3>เเก้ไขบิลค่าเช่าห้อง
                </h3>









                <div class="col-12 col-md-6 order-md-1 order-last">
                    
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">ตาราง</a></li>
                            <li class="breadcrumb-item active" aria-current="page">บิลค่าเช่าห้อง</li>
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
                            <h4 class="card-title">บิลค่าเช่าห้อง</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form form-horizontal" method="post"
                                    action="{{ route('bill.update', $data->id) }}">
                                    @csrf
                                    <div class="form-body">
                                        <div class="row">

                                            <div class="col-md-4">
                                                <label>เลขห้อง</label>
                                            </div>

                                            <div class="col-md-8 form-group">

                                                <input type="text" value="{{ $data->room_number }}" readonly id="room"
                                                    class="form-control">

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




                                                    <option value="มกราคม 2022"
                                                        {{ $data->bill == 'มกราคม 2022' ? 'selected' : '' }}>
                                                        มกราคม 2022</option>

                                                    <option value="กุมภาพันธ์ 2022"
                                                        {{ $data->bill == 'กุมภาพันธ์ 2022' ? 'selected' : '' }}>
                                                        กุมภาพันธ์ 2022</option>
                                                    <option value="มีนาคม 2022"
                                                        {{ $data->bill == 'มีนาคม 2022' ? 'selected' : '' }}>
                                                        มีนาคม 2022</option>
                                                    <option value="เมษายน 2022"
                                                        {{ $data->bill == 'เมษายน 2022' ? 'selected' : '' }}>
                                                        เมษายน 2022</option>
                                                    <option value="พฤษภาคม 2022"
                                                        {{ $data->bill == 'พฤษภาคม 2022' ? 'selected' : '' }}>
                                                        พฤษภาคม 2022</option>



                                                    <option value="มิถุนายน 2022"
                                                        {{ $data->bill == 'มิถุนายน 2022' ? 'selected' : '' }}>
                                                        มิถุนายน 2022</option>
                                                    <option value="กรกฎาคม 2022"
                                                        {{ $data->bill == 'กรกฎาคม 2022' ? 'selected' : '' }}>
                                                        กรกฎาคม 2022</option>
                                                    <option value="สิงหาคม 2022"
                                                        {{ $data->bill == 'สิงหาคม 2022' ? 'selected' : '' }}>
                                                        สิงหาคม 2022</option>


                                                    <option value="กันยายน 2022"
                                                        {{ $data->bill == 'กันยายน 2022' ? 'selected' : '' }}>
                                                        กันยายน 2022</option>

                                                    <option value="ตุลาคม 2022"
                                                        {{ $data->bill == 'ตุลาคม 2022' ? 'selected' : '' }}>
                                                        ตุลาคม 2022</option>
                                                    <option value="พฤศจิกายน 2022"
                                                        {{ $data->bill == 'พฤศจิกายน 2022' ? 'selected' : '' }}>
                                                        พฤศจิกายน 2022</option>
                                                    <option value="ธันวาคม 2022"
                                                        {{ $data->bill == 'ธันวาคม 2022' ? 'selected' : '' }}>
                                                        ธันวาคม 2022</option>





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
                                                <input type="text" value="{{ $data->rental_fee }}" readonly id="room"
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

                                                    <input type="number" min="{{ $data->water_old_meter + 1 }}" max=""
                                                        id="wnow1" onkeyup="sum()" value="{{ $data->water_now_meter }}"
                                                        class="form-control prc" name="water_now_meter">




                                                    @error('water_now_meter')
                                                        <div class="my-2">
                                                            <span class="text-danger">{{ $message }}</span>
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="col-2 form-group">
                                                    <label>ครั้งก่อน</label>





                                                    <input type="text" id="wold2" name="water_old_meter"
                                                        value="{{ $data->water_old_meter }}" readonly
                                                        class="form-control prc">
                                                    @error('water_old_meter')
                                                        <div class="my-2">
                                                            <span class="text-danger">{{ $message }}</span>
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="col-2 form-group">
                                                    <label>หน่วยที่ใช้</label>

                                                    <input type="text" value="{{ $data->water_unit }}" readonly
                                                        id="wunitresult" class="form-control" name="water_unit">
                                                    @error('water_unit')
                                                        <div class="my-2">
                                                            <span class="text-danger">{{ $message }}</span>
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="col-2 form-group">

                                                    <label>
                                                        ราคา/หน่วย</label>

                                                    <input type="text" value="{{ $data->water }}" readonly id="Wsum"
                                                        class="form-control" name="water">
                                                    @error('water')
                                                        <div class="my-2">
                                                            <span class="text-danger">{{ $message }}</span>
                                                        </div>
                                                    @enderror

                                                </div>
                                                <div class="col-2 form-group">
                                                    <label>รวม(บาท)</label>

                                                    <input type="text" value="{{ $data->water_sum }}" readonly
                                                        class="form-control" id="totalW" name="water_sum">
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

                                                    <input type="number" onkeyup="sum()"
                                                        min="{{ $data->electric_old_meter + 1 }}" max=""
                                                        value="{{ $data->electric_now_meter }}" id="enow1"
                                                        class="form-control" name="electric_now_meter">
                                                    @error('electric_now_meter')
                                                        <div class="my-2">
                                                            <span class="text-danger">{{ $message }}</span>
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="col-2 form-group">
                                                    <label>ครั้งก่อน</label>

                                                    <input type="number" id="eold2"
                                                        value="{{ $data->electric_old_meter }}" readonly
                                                        class="form-control" name="electric_old_meter">


                                                    @error('electric_old_meter')
                                                        <div class="my-2">
                                                            <span class="text-danger">{{ $message }}</span>
                                                        </div>
                                                    @enderror
                                                </div>

                                                <div class="col-2 form-group">
                                                    <label>หน่วยที่ใช้</label>

                                                    <input type="number" value="{{ $data->electric_unit }}" readonly
                                                        class="form-control" name="electric_unit" id="unitresult">
                                                    @error('electric_unit')
                                                        <div class="my-2">
                                                            <span class="text-danger">{{ $message }}</span>
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="col-2 form-group">

                                                    <label>
                                                        ราคา/หน่วย</label>

                                                    <input type="text" value="{{ $data->electric }}" readonly id="esum"
                                                        class="form-control" name="electric">
                                                    @error('electric')
                                                        <div class="my-2">
                                                            <span class="text-danger">{{ $message }}</span>
                                                        </div>
                                                    @enderror

                                                </div>
                                                <div class="col-2 form-group">
                                                    <label>รวม(บาท)</label>

                                                    <input type="text" value="{{ $data->electric_sum }}" readonly
                                                        class="form-control" id="totalE" name="electric_sum">
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
                                                <input type="text" value="{{ $data->total }}" readonly
                                                    class="form-control" name="total" id="totalall">
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
