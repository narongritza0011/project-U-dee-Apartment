@extends('layouts.fontend')

@section('header')
    <!-- Header -->
    <header id="header" class="header">
        <img class="decoration-star" src="{{ asset('fontend-assets/images/decoration-star.svg ') }}" alt="alternative">
        <img class="decoration-star-2" src=" {{ asset('fontend-assets/images/decoration-star.svg') }}" alt="alternative">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-xl-5">
                    <div class="text-container">
                        <h1 class="h1-large">ห้องพักอยู่ดีมีสุข</h1>
                        <p class="p-large">อยู่ดีอพาร์ทเม้นท์ ใกล้เซ็นทรัลเฟส เชียงใหม่</p>
                        <a class="btn-solid-lg" href="#introduction">รายละเอียดเพิ่มเติม</a>
                        <a class="btn-outline-lg" href="#contact">ติดต่อ</a>
                    </div> <!-- end of text-container -->
                </div> <!-- end of col -->
                <div class="col-lg-5 col-xl-7">
                    <div class="image-container">
                        <img class="img-fluid" src=" {{ asset('fontend-assets/images/dd.jpg ') }}" alt="alternative">
                    </div> <!-- end of image-container -->
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </header> <!-- end of header -->
    <!-- end of header -->
@endsection

@section('introduction')
    <!-- Introduction -->
    <div id="introduction" class="basic-1 bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-xl-9">
                    <h2>ยินดีต้อนรับสู่ ห้องพักอยู่ดีมีสุข
                    </h2>
                    <p>สิ้นเดือนนี้ มีห้องว่าง 3 ห้อง !!
                        (เข้าอยู่ได้ 27 กพ. 65)
                        หอพักเชียงใหม่ ใกล้เซ็นเฟส 1.8 กม.
                        ใกล้แยกรวมโชค 3 กม.
                        ห้องแอร์ 3,000/เดือน
                        เงินประกัน 3,000 บาท
                        เฟอร์นิเจอร์
                        เตียง ที่นอน โต๊ะเครื่องแป้ง ตู้เสื้อผ้า
                        แอร์+น้ำอุ่น
                        ห้องมีระเบียง
                        Keycard กล้องวงจรปิด
                        ค่าไฟ 7 บาท/ค่าน้ำ 100/คน/เดือน
                        Free wi-fi
                        Free ที่จอดรถยนต์ในร่ม
                        ไม่มีสัญญาเช่าขั้นต่ำ </p>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of basic-1 -->
    <!-- end of introduction -->
@endsection

@section('room')
    <!-- Details 1 -->
    <div id="details" class="basic-2">
        <img class="decoration-star" src=" {{ asset('fontend-assets/images/decoration-star.svg') }}" alt="alternative">
        <div class="container">
            <h2>รายการห้องพัก</h2>
            @foreach ($data as $item)
                <div class="row">
                    <div class="col-lg-6 col-xl-5">
                        <div class="image-container">
                            <img class="img-fluid" src="{{ asset($item->image) }}" width="80%" alt="alternative">
                        </div> <!-- end of image-container -->
                    </div> <!-- end of col -->
                    <div class="col-lg-6 col-xl-7">
                        <div class="text-container">
                            <h2>{{ $item->name }}</h2>
                            <ul class="list-unstyled li-space-lg">
                                <li class="d-flex">
                                    <i class="fas fa-square"></i>
                                    <div class="flex-grow-1">{{ $item->detail }}</div>
                                </li>
                                <li class="d-flex">
                                    <i class="fas fa-square"></i>
                                    <div class="flex-grow-1"> ราคา <strong
                                            class="text-success">{{ $item->price }}</strong>
                                    </div>
                                </li>
                                <li class="d-flex">
                                    <i class="fas fa-square"></i>
                                    <div class="flex-grow-1"> ราคา <strong
                                            class="text-success">{{ $item->name }}</strong>
                                    </div>
                                </li>
                            </ul>
                            <a class="btn-solid-reg" href="{{ route('room.detail', $item->id) }}">รายละเอียด</a>
                        </div> <!-- end of text-container -->
                    </div> <!-- end of col -->

                </div> <!-- end of row -->
            @endforeach
        </div> <!-- end of container -->
    </div> <!-- end of basic-2 -->
    <!-- end of details 1 -->
@endsection

@section('projects')
    <!-- Projects -->
    <div id="projects" class="cards-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="h2-heading">ข่าวสาร</h2>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
            <div class="row">
                <div class="col-lg-12">
                    @foreach ($news as $new)
                        <!-- Card -->
                        <div class="card">
                            {{-- <img class="img-fluid" src="{{ asset('fontend-assets/images/project-1.jpg ') }}" --}}
                            {{-- alt="alternative"> --}}
                            <div class="card-body">
                                <h5 class="card-title">{{ $new->title }}</h5>
                                <p class="card-text">{{ $new->detail }}</p>
                            </div>
                        </div>
                        <!-- end of card -->
                    @endforeach

                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of cards-2 -->
    <!-- end of projects -->
@endsection


@section('contact')
    <!-- Contact -->
    <div id="contact" class="form-1">
        <img class="decoration-star" src=" {{ asset('fontend-assets/images/decoration-star.svg') }}" alt="alternative">
        <img class="decoration-star-2" src=" {{ asset('fontend-assets/images/decoration-star.svg') }}" alt="alternative">
        <div class="container">


            <div class="row">
                <div class="col-lg-6">
                    <div class="image-container">
                        <img class="img-fluid" src=" {{ asset('fontend-assets/images/contact.png') }}"
                            alt="alternative">
                    </div> <!-- end of image-container -->
                </div> <!-- end of col -->
                <div class="col-lg-6">
                    <div class="text-container">
                        <h2>ติดต่อทางหอพัก</h2>

                        <!-- Contact Form -->
                        <form action="{{ route('contact.us.store') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="full_name" class="form-control-input" placeholder="ชื่อ-นามสกุล"
                                    required>
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" class="form-control-input" placeholder="อีเมล์" required>
                            </div>
                            <div class="form-group">
                                <input type="number" name="tel" class="form-control-input" placeholder="เบอร์ติดต่อ"
                                    required>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control-textarea" name="message" placeholder="ข้อความ"
                                    required></textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="form-control-submit-button">ส่งข้อความ</button>
                            </div>
                        </form>
                        <!-- end of contact form -->
                    </div> <!-- end of text-container -->
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of form-1 -->
    <!-- end of contact -->
@include('sweetalert::alert')

@endsection
