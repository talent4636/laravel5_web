<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title><{$site_title}></title>
    <script src="{{asset('js/admin/main_admin.js')}}"></script>
    <link rel="stylesheet" href="{{asset('css/admin/admin_login.css')}}" />
</head>
<body>
<div class="body">
    @yield('mainArea')
    <div class="footer">
        <span>{{$copy_right}}</span>
    </div>
</div>
</body>
</html>