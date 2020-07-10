
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="/frontend/img//apple-icon.png">
    <link rel="icon" type="image/png" href="/frontend/img//favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title> Aflam | @yield('title')</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <!-- CSS Files -->
    <link href="/frontend/css/bootstrap.min.css" rel="stylesheet" />
    <link href="/frontend/css/paper-kit.css?v=2.2.0" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="/frontend/demo/demo.css" rel="stylesheet" />
</head>

<body class="index-page sidebar-collapse">
@include('front-end.layouts.nav-bar')

<div class="main">
    @yield('content')
    @include('front-end.layouts.footer')
    @include('front-end.layouts.scripts')
</div>
</body>

</html>
