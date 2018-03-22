@extends('layouts.layout')

@section('content')







    <div class="content">
    <span class="right_corner_info message">
        Meting:
        <span class="signaal_created_at">{{$laatsteSignaal->created_at}}</span>
    </span>
    <span class="left_corner_info message">
        huidtype:
        <span >{{$user->huidtype}}</span>
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


            <p class="message">Ander huidtype?<a href="{{ route('vragenlijst') }}"> Vul vragenlijst in. </a> </p>
            <p class="message">Uitloggen? <a href="{{ url('/logout') }}"> logout </a> </p>




        </div>
    </div>























<!--<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if( ! empty($message))
                        <div class="alert alert-info">
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif

                        <ul>
                            <li>
                                <a href="{{ route('vragenlijst') }}">Stel je huidtype in</a>
                            </li>
                            <li>
                                Uw huidtype is: {{$user->huidtype}}
                            </li>
                            <li>
                                <h3>Laatste signaal: </h3>
                                sterkte:
                                <h1>{{ $laatsteSignaal->uv }} /11</h1>
                                tijd:
                                <h2> {{ $laatsteSignaal->created_at }} </h2>
                            </li>
                        </ul>







                </div>
            </div>
        </div>
    </div>
</div>-->

@endsection
