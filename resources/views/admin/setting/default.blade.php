@extends('layouts.admin')

@section('header')
    <link rel="stylesheet" href="{{asset('bootstrap-fileinput/css/fileinput.min.css')}}" />
    <script type="text/javascript" src="{{ asset('bootstrap-fileinput/js/fileinput.min.js') }}" charset="UTF-8"></script>
    <script type="text/javascript" src="{{ asset('bootstrap-fileinput/js/locales/zh.js') }}" charset="UTF-8"></script>
@endsection

@section('mainArea')
    <div class="alert alert-info">
        <button type="button" class="close" data-dismiss="alert">×</button>
        {{--<h4>提示!</h4>--}}
        <strong>警告!</strong> 请注意你的个人隐私安全.
    </div>
    <hr>
    <h3>设置轮播图</h3>
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
                <button class="btn btn-warning" type="button">按钮</button>
                <button class="btn btn-info" type="button">按钮</button>
                <button class="btn btn-primary" type="button">按钮</button>
                <button class="btn btn-success" type="button">按钮</button>
                <button class="btn btn-danger" type="button">按钮</button>
            </div>
        </div>
    </div>
    {{--首页轮播图--}}
    <br>
    <div class="container-fluid">
        <div class="row-fluid">
{{--            @foreach(['1','2','3','4'] as $k => $v)--}}
            <div class="span4 pull-left">
                {{--<div class="span12">--}}
                    {{--<img width="140" height="140" src="{{ asset('images/system/no_pic.jpg') }}" />--}}
                {{--</div>--}}
                {{--<form role="form" method="post" action="{{ url('admin/setting/image') }}">--}}
                    {{--<input type="hidden" name="_token" value="{{ csrf_token() }}">--}}
                    <div class="form-group">
{{--                        <label for="inputfile">首页轮播图-{{ $k+1 }}</label>--}}
                        {{--<input name="imagex" type="file" id="inputfile">--}}

                        {{--  TODO   默认值  ：  value="{{ asset('uploads/images/8c3a532ea7a9aab49946302cf05557f6.jpg') }}"--}}
                        <input name="image" type="file" multiple id="file-Portrait" >
                    </div>
                    {{--<button type="submit" class="btn btn-default">提交</button>--}}
                {{--</form>--}}
            </div>
            <form action="{{ url('admin/setting/save') }}" id="image_arr_hide" method="post">
                <input name="_token" value="{{ csrf_token() }}" class="hidden"/>
                @foreach($setting_img as $img)
                    <input type='text' name='image_arr[]' id="{{ $img['mark'] }}" class='hidden' value='{{ $img['mark'] }}'>
                @endforeach
                <input type="submit" class="btn btn-warning" value="提交修改" />
                <input type="submit" class="btn btn-default" value="取消修改" />
            </form>
            {{--@endforeach--}}
        </div>
    </div>
<script>
    var ctrlName = "file-Portrait";
    //初始化fileinput控件（第一次初始化）
    function initFileInput(ctrlName, uploadUrl) {
        var control = $('#' + ctrlName);
        control.fileinput({
            language: 'zh', //设置语言
            uploadUrl: uploadUrl, //上传的地址
            allowedFileExtensions : ['jpg', 'png','gif'],//接收的文件后缀
            showUpload: true, //是否显示上传按钮
            showCaption: true,//是否显示标题
            showRemove : true, //显示移除按钮
            browseClass: "btn btn-primary", //按钮样式
            previewFileIcon: "<i class='glyphicon glyphicon-king'></i>",
            overwriteInitial: false,
            initialPreviewAsData: true,
            //初始化图片
            initialPreview: [
                @foreach($setting_img as $img)
                "{{ asset($img['path']) }}",
                @endforeach
            ]
        });
    }

    //导入文件上传完成之后的事件
    $("#"+ctrlName).on("fileuploaded", function (event, data, previewId, index) {
//        alert(data.response.image_id);
        var hiddenForm = $('#image_arr_hide');
        $imgIdHtml = "<input type='text' name='image_arr[]'  class='hidden' value='"+data.response.image_id+"'>";
        hiddenForm.prepend($imgIdHtml);
    });
    initFileInput(ctrlName, "{{ url('admin/setting/image?_token='.csrf_token()) }}");

    //删除图片的操作
    $(".kv-file-remove").click(function(){
        var x = $(".kv-file-remove").index($(this));
        $(this).parents('.file-preview-frame').remove();
        $("#image_arr_hide").find("input[name!='_token']")[x].remove();//.find("[name!='_token']")
    });

</script>
@endsection