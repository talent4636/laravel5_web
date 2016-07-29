@extends('layouts.admin')


@section('mainArea')
    <div class="container-fluid" style="width: 90%;float: right;">
        <h4>语言分类列表（共 {{ count($language) }} 条）</h4>
        <div class="row-fluid">
            <div class="span12">
                {{--按钮组--}}
                <a style="color:#ffffff;" target="" href="{{ url('admin/questions/language/create') }}"><button class="btn btn-sm btn-warning" type="button">添加一种语言</button></a>
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
                        <th width="12%">
                            语言/分类名称
                        </th>
                        <th width="5%">
                            父类
                        </th>
                        <th width="10%">
                            创建时间
                        </th>
                        <th width="55%">
                            描述
                        </th>
                        <th width="13%">
                            操作
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($language as $key=> $lang)
                        <tr class="@if($key%2 == 0) success @else($key%2==1) warning  @endif">
                            <td>
                                {{ $lang->id }}
                            </td>
                            <td>
                                {{ $lang->name }}
                            </td>
                            <td>
                                {{ $lang->parent_id }}
                            </td>
                            <td>
                                {{ $lang->timestamps }}
                            </td>
                            <td>
                                {{ $lang->desc }}
                            </td>
                            <td>
                                <a href="{{ url('admin/questions/language/delete',[$lang->id]) }}">
                                    <button class="btn btn-sm btn-danger">删除</button>
                                </a>
                                <a href="{{ url('admin/questions/language/edit',[$lang->id]) }}">
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
                    <li class="@if($language->currentPage() == 1)disabled @endif">
                        <a href="@if($language->currentPage() == 1)#@else {{ url('admin/content/page',[$language->currentPage()-1]) }}@endif">&laquo;</a>
                    </li>
                    @for($i = 1;$i<=$language->lastPage();$i++)
                        <li class="@if($language->currentPage() == $i)disabled @endif">
                            <a href="@if($language->currentPage() == $i)#@else {{ url('admin/content/page',[$i]) }}@endif">{{ $i }}</a>
                        </li>
                    @endfor
                    <li class="@if($language->currentPage() == $language->lastPage())disabled @endif">
                        <a href="@if($language->currentPage() == $language->lastPage())#@else {{ url('admin/content/page',[$language->currentPage()+1]) }}@endif">&raquo;</a>
                    </li>
                </ul>
            {{--</div>--}}
        </div>
    </div>
@endsection