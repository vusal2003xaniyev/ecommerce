<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <title>@yield('title') | E-commerce</title>
    <link rel="icon" type="image/png" href="https://capitalist.az/main.png">
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&amp;display=swap" rel="stylesheet">
    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" href="{{ asset('assets/css/rt-plugins.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/app.css').$version}}">
	 <link rel="stylesheet" href="{{ asset('assets/css/editor.min.css').$version}}">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <!-- End : Theme CSS -->
    @yield('css')
</head>
