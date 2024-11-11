<!DOCTYPE html>
<html lang="en">

<head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>{{ config('app.name', 'FAQ') }}</title>
    <meta name="theme-color" content="#ffffff">
    @vite('resources/sass/app.scss')
</head>

<body>

    <div class="min-vh-100 d-flex flex-row align-items-center"
        style="background-image: url('{{ asset('assets/img/3.jpg') }}'); background-size: cover; background-position: center;">
        <div class="container">
            <div class="row justify-content-center">
                @yield('content')
            </div>
        </div>
    </div>
    <script src="{{ asset('js/coreui.bundle.min.js') }}"></script>
</body>

</html>
