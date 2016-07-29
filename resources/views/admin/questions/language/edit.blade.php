@extends('layouts.admin')


@section('mainArea')
    <div class="" style="width: 90%;float: right;">
    <a href="{{ url('admin/questions/language') }}" class="pull-right"><button class="btn btn-danger">取消，返回文章列表</button></a>
    <h4>添加一种语言分类</h4>
    <hr>
    <form role="form" method="post" action="{{ url('admin/questions/language/save') }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        @if(isset($language))
            <input type="hidden" name="id" value="{{ $language->id }}">
        @endif
        <div class="form-group">
            <label for="title">上级语言/分类</label>
            {{--<input type="text" class="form-control" name="title" id="title" placeholder="请输入语言/分类名称" value="{{ $language->name or '' }}">--}}
            <select class="form-control" name="parent_id">
                <option value="0">没有上级分类</option>
                @foreach($top_language as $key => $lang)
                    <option value="{{ $lang->id }}">{{ $lang->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="title" name="title">语言/分类名称</label>
            <input type="text" class="form-control" name="name" id="title" placeholder="请输入语言/分类名称" value="{{ $language->name or '' }}">
        </div>
        <div class="form-group">
            <label for="content">描述信息</label>
            <textarea class="form-control" rows="3" name="desc" id="content">{{ $language->desc or '' }}</textarea>
        </div>
        <button class="btn btn-block btn-primary" type="submit">提交</button>
    </form>
    </div>
@endsection