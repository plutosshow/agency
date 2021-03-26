<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        @yield('title')
    </title>
    <link rel="stylesheet" href="/admin/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="/admin/dist/css/adminlte.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    {{--Scripts    --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="/admin/dist/js/adminlte.js"></script>
    <script src="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js"></script>
    <script type="text/javascript">
        $.fias.token = 'Zrt785D7sGRQANHa9hfBGABRNKNZiEbR';
        $.fias.url = 'https://kladr-api.com/api.php';
    </script>


</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    @yield('content')
</div>

</body>
</html>
