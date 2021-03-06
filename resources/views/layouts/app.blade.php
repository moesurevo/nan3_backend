<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'NAN 3') }}</title>

    <!-- Scripts -->
    <link rel="stylesheet" href="/css/app.css">

</head>
<body class="hold-transition login-page">
        <main class="py-4">
            @yield('content')
        </main>
        <script type="text/javascript" src="/js/app.js"></script>
        <script>
              $(function () {
                $('input').iCheck({
                  checkboxClass: 'icheckbox_square-blue',
                  radioClass: 'iradio_square-blue',
                  increaseArea: '20%' /* optional */
                });
              });
        </script>
</body>
</html>

