<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
            <ul class="nav nav-tabs">
                @foreach($base_nav as $key => $nav)
                <li class="@if($nav['active']) active {{ $mainMenu=$key }}@if(isset($nav['sub_menu'])){{ $sub_menu = json_encode($nav['sub_menu']) }}@else{{ $sub_menu=false }}@endif @endif">
                    <a href=" @if($nav['active']) # @else {{ url("admin/$key") }} @endif">{{$nav['name']}}</a>
                </li>
                @endforeach
                <li class="dropdown pull-right">

                    <a href="#" data-toggle="dropdown" class="dropdown-toggle">更多操作<strong class="caret"></strong></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#">{{ $user_info['name'] }}</a>
                        </li>
                        <li>
                            <a href="#">注销</a>
                        </li>
                        <li>
                            <a href="#">更多设置</a>
                        </li>
                        <li class="divider">{{-- 这个可以用来分组 --}}
                        </li>
                        {{--<li>--}}
                            {{--<a href="#">分割线</a>--}}
                        {{--</li>--}}
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
@if($sub_menu)
<br>
<div class="container pull-left" style="width:10%;height: 500px;">
    <div class="row clearfix">
        <div class="col-md-12 column">
            <div class="list-group">
                @foreach(json_decode($sub_menu,1) as $key => $sub)
                <a href="{{url("admin/{$mainMenu}/{$key}")}}" class="list-group-item @if(isset($sub['active']) && $sub['active']) active @endif ">
                    @if(isset($sub['num']))<span class="badge">14</span>@endif
                    {{ $sub['name'] }}
                </a>
                @endforeach
                {{--<div class="list-group-item">--}}
                {{--List header--}}
                {{--</div>--}}
                {{--<div class="list-group-item">--}}
                {{--<h4 class="list-group-item-heading">--}}
                {{--List group item heading--}}
                {{--</h4>--}}
                {{--<p class="list-group-item-text">--}}
                {{--...--}}
                {{--</p>--}}
                {{--</div>--}}
                {{--<div class="list-group-item">--}}
                    {{--<span class="badge">14</span> Help--}}
                {{--</div> <a class="list-group-item active"> <span class="badge">14</span> Help</a>--}}
            </div>
        </div>
    </div>
</div>
@endif