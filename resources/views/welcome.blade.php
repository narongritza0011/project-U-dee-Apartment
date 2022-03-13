<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Car System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">





</head>

<body>


    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="/">Car System</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        {{-- <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Pricing</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled">Disabled</a> --}}


                        @if (Route::has('login'))
                            @auth
                                <a href="{{ route('admin.dashboard') }}"
                                    class="nav-link badge bg-success text-white">หน้าหลัก</a>
                            @else
                                <a href="{{ route('login') }}" class="nav-link badge bg-primary text-white">เข้าสู่ระบบ</a>


                            @endauth
                        @endif
                        </li>
                    </ul>
                </div>
            </div>
        </nav>



        <div class="card">
            <div class="card-body">




                @if (session('error'))
                    <div class="alert alert-warning">
                        {{ session()->get('error') }}
                    </div>
                @endif
                <div class="mb-3">



                    <h3>ตรวจสอบสถานะ</h3>



                </div>

                <form action="{{ route('check_status') }}" method="post">
                    @csrf
                    <input type="text" name="check_status" class="form-control">
                    <small class="text-danger">กรุณากรอกเบอร์โทร</small><br>
                    <hr>

                    <button type="submit" class="btn btn-dark mt-2">ตรวจสอบ</button>
                </form>


            </div>


        </div>


        @if (session('success'))
            <div class="card bg-dark mt-3">
                <div class="card-body">
                    <div class="alert alert-light">
                        {{ session()->get('success') }}
                    </div>

                    <p>


                    </p>
                </div>
            </div>
        @endif


    </div>







    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script>




</body>

</html>
