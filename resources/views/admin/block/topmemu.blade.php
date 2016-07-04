<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
            <ul class="nav nav-tabs">
                @foreach($base_nav as $key => $nav)
                <li class="@if($nav['active']) active @endif">
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