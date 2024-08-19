<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <title> Admin Panel | WIKISUN</title>
    <link rel="icon" type="image/png" href="https://capitalist.az/main.png">
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&amp;display=swap" rel="stylesheet">
    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" href="{{ asset('assets/css/rt-plugins.css').$version }}">
    <link rel="stylesheet" href="{{ asset('assets/css/app.css').$version }}">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <!-- End : Theme CSS -->
</head>
<body class=" font-inter skin-default">
<div class="loginwrapper bg-center" style="background-image: url(assets/images/all-img/background_admin.jpg?48);background-repeat: no-repeat;object-fit: cover">
    <div class="lg-inner-column">
        <div class="left-columns lg:w-1/2 lg:block hidden">
            <div class="logo-box-3">
               {{-- <a heref="index.html" class="">
                    <img src="assets/images/logo/logo-white.svg" alt="">
                </a>--}}
            </div>
        </div>
        <div class="lg:w-1/2 w-full flex flex-col items-center justify-center">
            <div class="auth-box-3">
                {{--<div class="mobile-logo text-center mb-6 lg:hidden block">
                    <a heref="index.html">
                        <img src="assets/images/logo/logo.svg" alt="" class="mb-10 dark_logo">
                        <img src="assets/images/logo/logo-white.svg" alt="" class="mb-10 white_logo">
                    </a>
                </div>--}}
                <div class="text-center 2xl:mb-10 mb-5">
                    <h1>WIKISUN</h1>
{{--                    <img src="{{asset('assets/images/logo/logo-capitalist.png')}}" class="my-2" alt="">--}}
                    <div class="text-slate-500 dark:text-slate-400 text-base">
                        Admin panel
                    </div>
                    @include('widgets.errors')
                </div>
                <!-- BEGIN: Lock Form -->
                <form class="space-y-4" action='{{route('loginPost')}}' method="POST">
                    @csrf
                    <div class="fromGroup">
                        <label class="block capitalize form-label">E-poçt</label>
                        <div class="relative ">
                            <input type="email" name="email" class="form-control py-2" placeholder="E-poçt daxil et">
                        </div>
                    </div>
                    <div class="fromGroup">
                        <label class="block capitalize form-label">Şifrə</label>
                        <div class="relative ">
                            <input type="password" name="password"  id="passwordInput" class="form-control py-2" placeholder="Şifrə daxil et">
                            <span class="toggleIcon" id="eye"><iconify-icon class=" nav-icon" icon="heroicons-outline:eye"></iconify-icon></span>
                            <span class="toggleIcon hidden" id="eye-slash"><iconify-icon class=" nav-icon" icon="heroicons-outline:eye-slash"></iconify-icon></span>
                        </div>
                    </div>
                    <button class="btn btn-dark block w-full text-center">Daxil ol</button>
                </form>
            </div>
        </div>
        {{--<div class="auth-footer3 text-white py-5 px-5 text-xl w-full">
            Unlock your Project performance
        </div>--}}
    </div>
</div>
<!-- scripts -->
<script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('assets/js/rt-plugins.js').$version }}"></script>
<script src="{{ asset('assets/js/app.js').$version }}"></script>
<script src="{{ asset('assets/js/password.js').$version }}"></script>
</body>
</html>
