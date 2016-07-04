@extends('layouts.admin')


@section('mainArea')
    <a href="{{ url('admin/content') }}" class="pull-right"><button class="btn btn-danger">取消，返回文章列表</button></a>
    <h4>添加新文章</h4>
    <hr>
    <form role="form" method="post" action="{{ url('admin/content/save') }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="id" value="{{ $content->id }}">
        <div class="form-group">
            <label for="title" name="title">标题</label>
            <input type="text" class="form-control" name="title" id="title" placeholder="请输入名称" value="{{ $content->title }}">
        </div>
        <div class="form-group">
            <label for="content">文章内容</label>
            <textarea class="form-control" rows="3" name="content" id="content">{{ $content->content }}</textarea>
        </div>
        {{--<div class="form-group">--}}
            {{--<label for="inputfile">文件输入</label>--}}
            {{--<input type="file" id="inputfile">--}}
            {{--<p class="help-block">这里是块级帮助文本的实例。</p>--}}
        {{--</div>--}}

        {{-- time picker--}}
        <div class="form-group">
            <label for="content">发表时间</label>
            <input type="text" class="" id="datepicker" name="publish_time" value="{{ $content->publish_time }}">
            <script>
                $('#datepicker').datetimepicker({
                    language:'zh-CN',
                    title:'请选择发表时间',
                    autoclose:true,
                    format: 'hh:ii:ss',
                    todayBtn:true,
                    pickerPosition: "bottom-right",
                    icontype: 'fa'
                });
            </script>
        </div>
        {{-- time picker--}}

        <div class="checkbox">
            <label>
                <input type="checkbox" value="1" name="disabled" @if($content->disabled == 1)checked="checked"@endif> 是否作废
            </label>
        </div>
        <button class="btn btn-block btn-primary" type="submit">提交</button>
    </form>

@endsection