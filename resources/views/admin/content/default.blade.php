@extends('layouts.admin')


@section('mainArea')
    {{--按钮，TODO定时关闭--}}
    <div class="alert alert-info">
        <button type="button" class="close" data-dismiss="alert">×</button>
        {{--<h4>--}}
            {{--提示!--}}
        {{--</h4> --}}
        <strong>警告!</strong> 请注意你的个人隐私安全.
    </div>
    <div class="container-fluid">
        <h4>文章列表（共 {{ $contents->total() }} 条）</h4>
        <div class="row-fluid">
            <div class="span12">
                {{--按钮组--}}
                <a style="color:#ffffff;" href="{{ url('admin/content/create') }}"><button class="btn btn-sm btn-warning" type="button">新建文章</button></a>
                <button class="btn btn-sm btn-info" type="button">删除文章</button>
                <button class="btn btn-sm btn-primary" type="button">批量发布</button>
                <button class="btn btn-sm btn-success" type="button">按发布时间排序</button>
                <button class="btn btn-sm btn-danger" type="button">按浏览次数排序</button>
            </div>
        </div>
        <br>
        {{--这里是文章列表部分--}}
        <div class="row-fluid">
            <div class="span12">
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>
                            编号
                        </th>
                        <th>
                            标题
                        </th>
                        <th>
                            创建时间
                        </th>
                        <th>
                            是否作废
                        </th>
                        <th>
                            操作
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($contents as $key=> $content)
                        <tr class="@if($key%2 == 0) success @else($key%2==1) warning  @endif">
                            <td>
                                {{ $content->id }}
                            </td>
                            <td>
                                {{ $content->title }}
                            </td>
                            <td>
                                {{ $content->created_at }}
                            </td>
                            <td>
                                @if($content->disabled == 1)
                                    已作废
                                @else
                                    正常
                                @endif
                            </td>
                            <td>
                                <a href="{{ url('admin/content/delete',[$content->id]) }}">
                                    <button class="btn btn-sm btn-danger">删除</button>
                                </a>
                                <a href="{{ url('admin/content/edit',[$content->id]) }}">
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
                <li class="@if($contents->currentPage() == 1)disabled @endif">
                    <a href="@if($contents->currentPage() == 1)#@else {{ url('admin/content/page',[$contents->currentPage()-1]) }}@endif">&laquo;</a>
                </li>
                @for($i = 1;$i<=$contents->lastPage();$i++)
                <li class="@if($contents->currentPage() == $i)disabled @endif">
                    <a href="@if($contents->currentPage() == $i)#@else {{ url('admin/content/page',[$i]) }}@endif">{{ $i }}</a>
                </li>
                @endfor
                <li class="@if($contents->currentPage() == $contents->lastPage())disabled @endif">
                    <a href="@if($contents->currentPage() == $contents->lastPage())#@else {{ url('admin/content/page',[$contents->currentPage()+1]) }}@endif">&raquo;</a>
                </li>
            </ul>
        </div>
    </div>
@endsection