@extends('layouts.admin')


@section('mainArea')
    <div class="" style="width: 90%;float: right;">
    <a href="{{ url('admin/questions/questions') }}" class="pull-right"><button class="btn btn-danger">取消，返回题目列表</button></a>
    <h4>添加一个题目</h4>
    <hr>
    <form role="form" method="post" action="{{ url('admin/questions/questions/save') }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        @if(isset($questions))
            <input type="hidden" name="id" value="{{ $questions->id }}">
        @endif
        <div class="form-group">
            <label for="title">所属语言/分类</label>
            <span class="form-control">
            @if(isset($language))
                @foreach($language as $lang)
                    <input type="radio" name="language_type" value="{{ $lang->id }}" @if(isset($questions) && ($questions->language_type == $lang->id)) checked="checked"@endif> {{ $lang->name }}  &nbsp;
                @endforeach
            @endif
            </span>
        </div>
        <div class="form-group">
            <label for="title" name="title">分值</label>
            <input type="text" class="form-control" name="score" id="title" placeholder="请输入一个整数" value="{{ $questions->score or 0 }}">
        </div>
        <div class="form-group">
            <label for="title" name="title">题目内容</label>
            <textarea class="form-control" rows="3" name="content" id="content">{{ $questions->content or '' }}</textarea>
        </div>
        <div class="form-group">
            <label for="title">题目类型</label>
            <span class="form-control">
                <input type="radio" name="question_type" value="select"  @if(isset($questions) && ($questions->question_type == 'select')) checked="checked" @endif> 单选  &nbsp;
                <input type="radio" name="question_type" value="muti_select"  @if(isset($questions) && ($questions->question_type == 'muti_select')) checked="checked" @endif> 多选  &nbsp;
                <input type="radio" name="question_type" value="fill"  @if(isset($questions) && ($questions->question_type == 'fill')) checked="checked" @endif> 填空  &nbsp;
                <input type="radio" name="question_type" value="answer"  @if(isset($questions) && ($questions->question_type == 'answer')) checked="checked" @endif> 简答  &nbsp;
                <input type="radio" name="question_type" value="code"  @if(isset($questions) && ($questions->question_type == 'code')) checked="checked" @endif> 编程  &nbsp;
            </span>
        </div>
        <div class="form-group">
            <label for="content">答案</label>
            <textarea class="form-control" rows="3" name="answer" id="content">{{ $questions->answer or '' }}</textarea>
        </div>
        <button class="btn btn-block btn-primary" type="submit">提交</button>
    </form>
    </div>
    <script>
        $("[name='language_type']").change(function(){
            var que_type = $(this).val();
            switch (que_type){
                //TODO 选择不同的类型，有不同的输入题目的方式，更人性化
            }
//            alert(que_type);
        });
    </script>
@endsection