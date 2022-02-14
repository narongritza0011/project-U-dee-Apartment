@extends('layouts.fontend')



<!-- Header -->
<header class="ex-header bg-gray">
    <div class="container">
        <div class="row">
            <div class="col-xl-10 offset-xl-1">
                <h1>รายละเอียด</h1>
            </div> <!-- end of col -->
        </div> <!-- end of row -->
    </div> <!-- end of container -->
</header> <!-- end of ex-header -->
<!-- end of header -->


<!-- Basic -->
<div class="ex-basic-1 pt-3 pb-5">
    <div class="container">
        <div class="row">
            <div class="col-xl-10 offset-xl-1">
                <h2 class="mb-4">{{ $data->name }}</h2>
                <img class="img-fluid mb-5" src=" {{ asset($data->image) }}" width="500px" alt="ไม่มีรูปภาพ">
                <div class="row">
                    <h3>รูปห้องเพิ่มเติม</h3>
                    @foreach ($albums as $album)
                        <div class="col-3">
                            <img src="{{ asset($album->name) }}" class="img-fluid " width="300"
                                style="height: 300px;" alt="ไม่มีรูปภาพ">
                        </div>
                    @endforeach


                </div>
                <div class="text-box mb-5">
                    <h3>รายละเอียดเพิ่มเติม</h3>
                    <p> {{ $data->detail }}</p>
                    <p> ราคา <strong class="text-success">{{ $data->price }}</strong></p>

                </div> <!-- end of text-box -->
                <a class="btn-solid-reg mb-5" href="{{ url('/#contact') }}">ติดต่อ</a>
            </div> <!-- end of col -->
        </div> <!-- end of row -->
    </div> <!-- end of container -->
</div> <!-- end of ex-basic-1 -->
<!-- end of basic -->
