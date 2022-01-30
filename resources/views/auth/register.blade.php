<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Mazer Admin Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="stylesheet" href="assets/css/pages/auth.css">
</head>

<body>
    <div id="auth">

        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    <div class="auth-logo">
                        <!-- <a href="/"><img src="assets/images/logo/undraw_personal_information_re_vw8a.svg" alt="Logo"></a> -->
                    </div>

                    <a href="/"> <img class="mb-2" src="assets/images/logo/undraw_personal_information_re_vw8a.svg" height="300" alt="Logo"></a>

                    <h1 class="auth-title mb-2">สมัครสมาชิก</h1>
                    <p class="auth-subtitle mb-5">กรุณากรอกข้อมูลให้ครบทุกช่อง</p>

                    <form method="POST" action="{{ route('register') }}">
                        @if(Session::get('success'))
                        <div class="alert alert-success">
                            {{Session::get('success')}}
                        </div>
                        @endif
                        @if(Session::get('error'))
                        <div class="alert alert-danger">
                            {{Session::get('error')}}
                        </div>
                        @endif
                        @csrf

                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" class="form-control form-control-xl @error('name') is-invalid @enderror" name="name" placeholder="ชื่อ-นามสกุล" value="{{ old('name') }}" autocomplete="name" autofocus>
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>

                        </div>
                        <span class="text-danger">@error('name')<strong>{{ $message }}</strong>@enderror</span>

                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" id="email" type="email" class="form-control form-control-xl  @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" placeholder="อีเมล์">
                            <div class="form-control-icon">
                                <i class="bi bi-envelope"></i>
                            </div>

                        </div>
                        <span class="text-danger">@error('email')<strong>{{ $message }}</strong>@enderror</span>

                        <div class="form-group position-relative has-icon-left mb-4">
                            <input id="tel" type="tel" class="form-control form-control-xl @error('email') is-invalid @enderror" name="tel" value="{{ old('tel') }}" autocomplete="tel" placeholder="เบอร์ติดต่อ">
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>

                        </div>

                        <span class="text-danger">@error('tel')<strong>{{ $message }}</strong>@enderror</span>

                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" class="form-control form-control-xl @error('password') is-invalid @enderror" name="password" autocomplete="new-password" placeholder="รหัสผ่าน">
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>

                        </div>
                        <span class="text-danger">@error('password')<strong>{{ $message }}</strong>@enderror</span>

                        <div class="form-group position-relative has-icon-left mb-4">
                            <input id="password-confirm" type="password" class="form-control form-control-xl" name="password_confirmation" placeholder="ยืนยันรหัสผ่าน" autocomplete="new-password">

                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>
                        <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">สมัครสมาชิก</button>
                    </form>
                    <div class="text-center mt-5 text-lg fs-4">
                        <p class='text-gray-600'>คุณมีบัญชีผู้ใชอยู่เเล้ว ? <a href="{{route('login')}}" class="font-bold">เข้าสู่ระบบ</a>.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right">

                </div>
            </div>
        </div>

    </div>
</body>

</html>