@extends('layouts.appnew')

@section('content')
    <div id="myCarousel" class="carousel slide container-fluid">
        <!-- 轮播（Carousel）指标 -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
            <li data-target="#myCarousel" data-slide-to="3"></li>
        </ol>
        <!-- 轮播（Carousel）项目 -->
        <div class="carousel-inner">
            @foreach($image_ads as $k => $img)
                <div class="item @if($k=='0')active @endif">
                    <img class="carousel-inner img-responsive img-rounded media-middle" style="width:auto;height:600px;margin: 0 auto;" src="{{ '../'.$img.'#'.time() }}" alt="@if($k=='0') First slide
                    @elseif($k=='1') Second slide
                    @elseif($k=='2') Third slide
                    @elseif($k=='3') Forth slide @endif">
                    <div class="carousel-caption">{{ $img }}</div>
                </div>
            @endforeach
        </div>
        <!-- 轮播（Carousel）导航 -->
        <a class="carousel-control left" href="#myCarousel"
           data-slide="prev">&lsaquo;</a>
        <a class="carousel-control right" href="#myCarousel"
           data-slide="next">&rsaquo;</a>
    </div>
@endsection