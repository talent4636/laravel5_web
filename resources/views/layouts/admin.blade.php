<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>管理后台</title>
    <link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
    <script src="//cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="{{asset('js/admin/main_admin.js')}}"></script>
    <link rel="stylesheet" href="{{asset('css/admin/main_admin.css')}}" />
    <script type="text/javascript" src="{{ asset('bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js') }}" charset="UTF-8"></script>
    {{--中文包需要引入--}}
    <script type="text/javascript" src="{{ asset('bootstrap-datetimepicker/js/locales/bootstrap-datetimepicker.zh-CN.js') }}" charset="UTF-8"></script>
    @yield('header')
</head>
<body>
    <div class="body">
        <br>
        @include('admin.block.topmemu')
        <br>
        @yield('mainArea')
    </div>
</body>
</html>