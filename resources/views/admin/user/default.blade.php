@extends('layouts.admin',['base_nav',$base_nav])


@section('mainArea')
    <div class="container-fluid">
        <h4>文章列表（共 {{ $users->total() }} 条）</h4>
        <div class="row-fluid">
            <div class="span12">
                {{--按钮组--}}
                <a style="color:#ffffff;" href="{{ url('admin/user/create') }}"><button class="btn btn-sm btn-warning" type="button">添加用户</button></a>
                {{--<button class="btn btn-sm btn-info" type="button">删除用户</button>--}}
                {{--<button class="btn btn-sm btn-primary" type="button">批量发布</button>--}}
                {{--<button class="btn btn-sm btn-success" type="button">按发布时间排序</button>--}}
                {{--<button class="btn btn-sm btn-danger" type="button">按浏览次数排序</button>--}}
            </div>
        </div>
        <br>
        <div class="row-fluid">
            <div class="span12">
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>用户编号</th>
                        <th>用户名</th>
                        <th>邮箱</th>
                        <th>注册时间</th>
                        <th>最后更新时间</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $key=> $user)
                        <tr class="@if($key%2 == 0) success @else($key%2==1) warning  @endif">
                            <td>
                                {{ $user->id }}
                            </td>
                            <td>
                                {{ $user->name }}
                            </td>
                            <td>
                                {{ $user->email }}
                            </td>
                            <td>
                                {{ $user->created_at }}
                            </td>
                            <td>
                                {{ $user->updated_at }}
                            </td>
                            <td>
                                <a href="{{ url('admin/user/delete',[$user->id]) }}" onclick="confirm('确认删除吗？');">
                                    <button class="btn btn-sm btn-danger">删除</button>
                                </a>
                                <a href="{{ url('admin/user/edit',[$user->id]) }}" target="_blank">
                                    <button class="btn btn-sm btn-info">编辑</button>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            {{--分页代码--}}
            <ul class="pagination pull-right">
                <li class="@if($users->currentPage() == 1)disabled @endif">
                    <a href="@if($users->currentPage() == 1)#@else {{ url('admin/content/page',[$users->currentPage()-1]) }}@endif">&laquo;</a>
                </li>
                @for($i = 1;$i<=$users->lastPage();$i++)
                    <li class="@if($users->currentPage() == $i)disabled @endif">
                        <a href="@if($users->currentPage() == $i)#@else {{ url('admin/content/page',[$i]) }}@endif">{{ $i }}</a>
                    </li>
                @endfor
                <li class="@if($users->currentPage() == $users->lastPage())disabled @endif">
                    <a href="@if($users->currentPage() == $users->lastPage())#@else {{ url('admin/content/page',[$users->currentPage()+1]) }}@endif">&raquo;</a>
                </li>
            </ul>
        </div>
    </div>
@endsection