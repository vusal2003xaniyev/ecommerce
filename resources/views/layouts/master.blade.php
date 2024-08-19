<!DOCTYPE html>
<html lang="zxx" dir="ltr" class="dark">
@include('layouts.head')
<body class=" font-inter dashcode-app" id="body_class">

<main class="app-wrapper">
    <div id="loading-overlay" style="display: none">
        <div class="loading-spinner"></div>
    </div>
    @include('layouts.sidebar')
    <div class="flex flex-col justify-between min-h-screen">
        <div>
            @include('layouts.header')
            @yield('content')
        </div>
        @include('layouts.footer')
    </div>
</main>
@include('layouts.js')
</body>
</html>
