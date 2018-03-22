@extends('layouts.layout')
@section('content')
<div class="content">
    <span class="right_corner_info message">
        Meting:
        <span class="signaal_created_at">{{$laatsteSignaal->created_at}}</span>
    </span>

    <!--diplaySun-->
    <div class="inner_content">
        <?php $suncolor = ''; ?>
        @switch(intval($laatsteSignaal->uv))
            @case(0)
            @case(1)
            @case(2)
                <?php $suncolor = 'blue'; ?>
            @break
            @case(3)
            @case(4)
                <?php $suncolor = 'green'; ?>
            @break
            @case(5)
            @case(6)
                <?php $suncolor = 'yellow'; ?>
            @break
            @case(7)
            @case(8)
                <?php $suncolor = 'orange'; ?>
            @break
            @case(9)
            @case(10)
            @case(11)
                <?php $suncolor = 'red'; ?>
            @break
            @default

        @endswitch
        <i class="fa fa-sun-o fa-6" id="sun_logo" style="color:{{$suncolor}};" aria-hidden="true"></i>

        <!--diplayBAR-->

                <?php
                $blue='none' ;
                $green= 'none' ;
                $orange= 'none' ;
                $yellow= 'none' ;
                $red= 'none' ;
                ?>


                @switch(intval($laatsteSignaal->uv))
                    @case(0)
                    @case(1)
                    @case(2)
                        <?php $blue = 'inline-block;' ?>
                    @break
                    @case(3)
                    @case(4)
                        <?php $blue = 'inline-block;' ?>
                        <?php $green = 'inline-block;' ?>
                    @break
                    @case(5)
                    @case(6)
                        <?php $blue = 'inline-block;' ?>
                        <?php $green = 'inline-block;' ?>
                        <?php $yellow = 'inline-block;' ?>
                    @break
                    @case(7)
                    @case(8)
                        <?php $blue = 'inline-block;' ?>
                        <?php $green = 'inline-block;' ?>
                        <?php $orange = 'inline-block;' ?>
                        <?php $yellow = 'inline-block;' ?>
                    @break
                    @case(9)
                    @case(10)
                    @case(11)
                        <?php $blue = 'inline-block;' ?>
                        <?php $green = 'inline-block;' ?>
                        <?php $orange = 'inline-block;' ?>
                        <?php $yellow = 'inline-block;' ?>
                        <?php $red = 'inline-block;' ?>
                    @break
            @default
                    Error
        @endswitch
        <ul id="temp_bar">
            <li class="blue" style="display:{{$blue}}"></li>
            <li class="green" style="display:{{$green}}"></li>
            <li class="yellow" style="display:{{$yellow}}"></li>
            <li class="orange" style="display:{{$orange}}"></li>
            <li class="red" style="display:{{$red}}"></li>
        </ul>

        <p class="message">Zonnensterkte: <span class="signaal_uv" class="highlight">{{$laatsteSignaal->uv}}</span> / 11</p>


        <p class="message">Beter zonadvies? <a href="{{ route('login') }}">log hier in. </a></p>
    </div>
</div>
@endsection

