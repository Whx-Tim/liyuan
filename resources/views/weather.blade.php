@extends('layouts.app')

@section('title','天气预报')

@section('content')
    <div class="container">

        <div class="row">
            <div class="row">
                <!--预警信息，例如红色暴雨预警-->
                <div class="col-xs-4"></div>
                <div class="col-xs-1">
                    <!--实时图标,图片已下载文件，但是并没有预警信号的图片=。=-->
                    <img src="weathers/1.svg" class="img-circle img-responsive"/>
                </div>
                <div class=""></div>
                <div class="col-xs-5">
                    <!--某地实时天气预警信息的文字描述-->
                    <p>广东省深圳市发布</p>
                </div>
            </div>
            @for($i=0;$i<5;$i++)
                @if(!$i)
                    <div class="row">
                        <div class="col-xs-1"></div>
                        <!--第一天，即当天-->
                        <div class="col-xs-3">
                            <!--天气图标可以用文件夹的,也可以从API直接取	img1    天气图标代码-->
                            <img src="weathers/{{$images[$i]}}.svg" class="img-rounded img-responsive"/>
                        </div>
                        <div class="col-xs-7">
                            <div class="row">
                                <!--年月日date_y 星期几week 实时温度（不明）-->
                                <h3 class="text-center">{{ $forecasts[$i]->date }}</h3>
                                <h3 class="text-center">{{ $wendu }}℃</h3>
                            </div>
                            <div class="row">
                                <!--	temp1	最高温到最低温-->
                                <h3 class="text-center">{{ $forecasts[$i]->high }}~{{ $forecasts[$i]->low }}</h3>
                            </div>
                            <div class="row">
                                <!--	img_title1	天气图标1的标题-->
                                <h4 class="text-center">{{ $forecasts[$i]->type }}</h4>
                            </div>
                            <div class="row">
                                <!--	wind1	天气风速描述,	fl1		风速级别描述-->
                                <h4 class="text-center">{{ $forecasts[$i]->fengli }}</h4>
                            </div>
                            <div class="row">
                                <h4 class="text-center">今日建议:{{ $ganmao }}</h4>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <hr/>
                    </div>
                @else
                        <div class="col-xs-1"></div>
                        <div class="col-xs-1">
                            <!--第二天-->
                            <div class="row">
                                <h4 class="text-center">{{ $forecasts[$i]->date }}</h4>
                            </div>
                            <div class="row">
                                <!--天气图标可以用文件夹的,也可以从API直接取	img2    气图标代码-->
                                <img src="weathers/{{$images[$i]}}.svg" class="img-rounded img-responsive"/>
                            </div>
                            <div class="row">
                                <!--	temp2	最高温到最低温-->
                                <h3 class="text-center">{{ $forecasts[$i]->high }}~{{ $forecasts[$i]->low }}</h3>
                            </div>
                            <div class="row">
                                <!--	img_title2	天气图标1的标题-->
                                <h4 class="text-center">{{ $forecasts[$i]->type }}</h4>
                            </div>
                            <div class="row">
                                <!--	wind2	天气风速描述,	fl2		风速级别描述-->
                                <h4 class="text-center">{{ $forecasts[$i]->fengli }}</h4>
                            </div>
                        </div>
                @endif
            @endfor
        </div>
    </div>
@endsection