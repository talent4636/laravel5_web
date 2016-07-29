@extends('layouts.admin')


@section('mainArea')
    <div class="container-fluid" style="width: 90%;float: right;">
        <h4>题目列表（共 {{ count($questions) }} 条）</h4>
        <div class="row-fluid">
            <div class="span12">
                {{--按钮组--}}
                <a style="color:#ffffff;" target="" href="{{ url('admin/questions/questions/create') }}"><button class="btn btn-sm btn-warning" type="button">添加一种语言</button></a>
                {{--<button class="btn btn-sm btn-info" type="button">删除语言</button>--}}
            </div>
        </div>
        <br>
        {{--这里是内容部分--}}
        <div class="row-fluid">
            <div class="span12">
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th width="5%">
                            编号
                        </th>
                        <th width="11%">
                            语言/分类名称
                        </th>
                        <th width="5%">
                            分数
                        </th>
                        <th width="39%">
                            内容
                        </th>
                        <th width="20%">
                            答案
                        </th>
                        <th width="5%">
                            问题类型
                        </th>
                        <th width="15%">
                            操作
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($questions as $key=> $qus)
                        <tr class="@if($key%2 == 0) success @else($key%2==1) warning  @endif">
                            <td>
                                {{ $qus->id }}
                            </td>
                            <td>
                                {{ $qus->language_type }}
                            </td>
                            <td>
                                {{ $qus->score }}
                            </td>
                            <td>
                                {{ $qus->content }}
                            </td>
                            <td>
                                {{ $qus->answer }}
                            </td>
                            <td>
                                {{ $qus->question_type }}
                            </td>
                            <td>
                                <a href="{{ url('admin/questions/questions/delete',[$qus->id]) }}">
                                    <button class="btn btn-sm btn-danger">删除</button>
                                </a>
                                <a href="{{ url('admin/questions/questions/edit',[$qus->id]) }}">
                                    <button class="btn btn-sm btn-info">编辑</button>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            {{--分页代码--}}
            {{--<div class="container text-center" style="padding-bottom: 40px;">--}}
            <ul class="pagination pull-right">
                <li class="@if($questions->currentPage() == 1)disabled @endif">
                    <a href="@if($questions->currentPage() == 1)#@else {{ url('admin/content/page',[$questions->currentPage()-1]) }}@endif">&laquo;</a>
                </li>
                @for($i = 1;$i<=$questions->lastPage();$i++)
                    <li class="@if($questions->currentPage() == $i)disabled @endif">
                        <a href="@if($questions->currentPage() == $i)#@else {{ url('admin/content/page',[$i]) }}@endif">{{ $i }}</a>
                    </li>
                @endfor
                <li class="@if($questions->currentPage() == $questions->lastPage())disabled @endif">
                    <a href="@if($questions->currentPage() == $questions->lastPage())#@else {{ url('admin/content/page',[$questions->currentPage()+1]) }}@endif">&raquo;</a>
                </li>
            </ul>
            {{--</div>--}}
        </div>
    </div>
@endsection