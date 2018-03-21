@extends('layouts.layout')
@section('content')
<div class="content">
    <span class="timestamp_info">
        Meting:
        {{$laatsteSignaal->created_at}}
    </span>

    <!--diplaySun-->
    <div class="inner_content">
        @switch(intval($laatsteSignaal->uv))
            @case(1)
            @case(2)
            <i class="fa fa-sun-o fa-6" id="sun_logo" style="color:blue;" aria-hidden="true"></i>
            @break
            @case(3)
            @case(4)
            <i class="fa fa-sun-o fa-6" id="sun_logo" style="color:green;" aria-hidden="true"></i>
            @break
            @case(5)
            @case(6)
            <i class="fa fa-sun-o fa-6" id="sun_logo" style="color:yellow;" aria-hidden="true"></i>
            @break
            @case(7)
            @case(8)
            <i class="fa fa-sun-o fa-6" id="sun_logo" style="color:orange;" aria-hidden="true"></i>
            @break
            @case(9)
            @case(10)
            @case(11)
            <i class="fa fa-sun-o fa-6" id="sun_logo" style="color:red;" aria-hidden="true"></i>
            @break

                @default
                <i class="fa fa-sun-o fa-6" id="sun_logo" style="color:black;" aria-hidden="true"></i>
        @endswitch


        <!--diplayBAR-->
            <ul id="temp_bar">
                @switch(intval($laatsteSignaal->uv))
                    @case(1)
                    @case(2)
                    <li class="blue"></li>
                    @break
                    @case(3)
                    @case(4)
                    <li class="blue"></li>
                    <li class="green"></li>
                    @break
                    @case(5)
                    @case(6)
                    <li class="blue"></li>
                    <li class="green"></li>
                    <li class="yellow"></li>
                    @break
                    @case(7)
                    @case(8)
                    <li class="blue"></li>
                    <li class="green"></li>
                    <li class="yellow"></li>
                    <li class="orange"></li>
                    @break
                    @case(9)
                    @case(10)
                    @case(11)
                    <li class="blue"></li>
                    <li class="green"></li>
                    <li class="orange"></li>
                    <li class="red"></li>
            @break
            @default
                <li style="width:100% !important;">ERROR</li>
        @endswitch
        </ul>

        <p>Zonnensterkte: <span class="highlight">{{$laatsteSignaal->uv}}</span> / 11</p>


        <p>Beter zonadvies? <a href="{{ route('login') }}">log hier in. </a></p>
    </div>
</div>
@endsection

