@extends('layouts.admin_withoutmenu')


@section('mainArea')
    <div class="main_box">
        <div class="login">
            <form method="post" action="/index.php/admin/login">
                <table>
                    <tr>
                        <th>用户名：</th>
                        <td><input type="text" name="user"></td>
                    </tr>
                    <tr>
                        <th>密码：</th>
                        <td><input type="text" name="password"></td>
                    </tr>
                    <tr>
                        <th>验证码：</th>
                        <td>
                            <input type="text" class="vcode" name="vcode">
                            <a style="font-size: 12px;" href="#"><img src="sadf.jpg" class="vcode_img">刷新</a>
                        </td>
                    </tr>
                </table>
                <input class="submit-login" type="submit" value="登&nbsp;&nbsp;陆">
            </form>
        </div>
    </div>
@endsection