<!DOCTYPE html><!--EdaLayout/master.blade.php-->
<html>
<head>
    <title>{{ config('app.name') }} Mark 1</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">

</head>
<body>
    @yield('content')

    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'article-ckeditor' );
    </script>
</body>
</html>
