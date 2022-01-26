<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Mazer Admin Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/bootstrap-icons/bootstrap-icons.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/app.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/pages/auth.css')}}">
</head>

<body>
    <div id="auth">

        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    <div class="auth-logo">
                        <!-- <a href="/"><img src="assets/images/logo/logo_dashboard.svg" alt="Logo"></a> -->
                    </div>
                    <a href="/"> <img class="mb-2" src="assets/images/logo/logo_dashboard.svg" height="300" alt="Logo"></a>

                    <h1 class="auth-title mb-2">ระบบจัดการข้อมูล</h1>

                    <p class="auth-subtitle mb-5">ยินดีต้อนรับ เข้าสู่ระบบ</p>

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" class="form-control form-control-xl @error('email') is-invalid @enderror" name="email" placeholder="อีเมล์">
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                        <span class="text-danger">@error('email')<strong>{{ $message }}</strong>@enderror</span>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" class="form-control form-control-xl  @error('password') is-invalid @enderror" name="password" placeholder="รหัสผ่าน">
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>

                        </div>
                        <span class="text-danger">@error('password')<strong>{{ $message }}</strong>@enderror</span>


                        <div class="form-check form-check-lg d-flex align-items-end">
                            <input class="form-check-input me-2" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label text-gray-600" for="flexCheckDefault">
                                จดจำรหัสผ่าน
                            </label>
                        </div>
                        <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">{{ __('เข้าสู่ระบบ') }}</button>
                        @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('ลืมรหัสผ่าน ?') }}
                        </a>
                        @endif
                    </form>
                    <div class="text-center mt-5 text-lg fs-4">
                        <p class="text-gray-600">คุณยังไม่มีบัญชีใช่ไหม ? <a href="{{route('register')}}" class="font-bold">สมัครสมาชิก</a>.</p>
                        <p><a class="font-bold" href="{{ route('password.request') }}">ลืมรหัสผ่าน ?</a></p>
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