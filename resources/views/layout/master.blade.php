<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <link rel="stylesheet" href="{{secure_asset('css/style.css') }}">
</head>

<body>
    @include('sweetalert::alert')
    @yield('content')
    <script src="{{secure_asset('js/datatables.js') }}"></script>
    <script src="{{secure_asset('js/sweetalert.js') }}"></script>
    <script src="{{secure_asset('js/jquery.js') }}"></script>
    <script src="{{secure_asset('js/flowbite.js') }}"></script>
    @stack('script')
</body>

</html>
