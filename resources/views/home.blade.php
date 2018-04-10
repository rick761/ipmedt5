@extends('layouts.layout')

@section('content')



            <span class="signaal_uv_groot">{{ round($laatsteSignaal->uv) }}</span>

            <!--<div class=" inner_content  mb-5 d-block mx-auto">-->
                <?php $suncolor = ''; ?>
                @switch(intval($laatsteSignaal->uv))
                    @case(0)
                    @case(1)
                    <?php $suncolor = 'gray'; ?>
                    @break;
                    @case(2)
                    <?php $suncolor = 'blue'; ?>
                    @break
                    @case(3)
                    <?php $suncolor = 'lightblue'; ?>
                    @break;
                    @case(4)
                    <?php $suncolor = 'green'; ?>
                    @break
                    @case(5)
                    <?php $suncolor = 'yellow'; ?>
                    @break;
                    @case(6)
                    <?php $suncolor = 'orange'; ?>
                    @break
                    @case(7)
                    <?php $suncolor = 'red'; ?>
                    @break
                    @case(8)
                    @case(9)
                    @case(10)
                    @case(11)
                    <?php $suncolor = 'black'; ?>
                    @break
                    @default

                @endswitch
                <i class="fa fa-sun-o fa-6" id="sun_logo" style="color:{{$suncolor}};" aria-hidden="true"></i>


            <?php
            $white='none' ;
            $blue='none' ;
            $lightblue='none' ;
            $green= 'none' ;
            $orange= 'none' ;
            $yellow= 'none' ;
            $red= 'none' ;
            $black = 'none';
            ?>


            @switch(intval($laatsteSignaal->uv))
                @case(0)
                <?php
                $white='inline-block' ;
                ?>
                @break;
                @case(1)
                <?php
                $white='inline-block' ;
                ?>
                @break;
                @case(2)
                <?php
                $white='inline-block' ;
                $blue='inline-block' ;
                ?>

                @break
                @case(3)
                <?php
                $white='inline-block' ;
                $blue='inline-block' ;
                $lightblue='inline-block' ;
                ?>
            @break
            @case(4)
            <?php
            $white='inline-block' ;
            $blue='inline-block' ;
            $lightblue='inline-block' ;
            $green= 'inline-block' ;


            ?>
            @break
            @case(5)
            <?php
            $white='inline-block' ;
            $blue='inline-block' ;
            $lightblue='inline-block' ;
            $green= 'inline-block' ;
            $yellow= 'inline-block' ;


            ?>
            @break
            @case(6)
            <?php
            $white='inline-block' ;
            $blue='inline-block' ;
            $lightblue='inline-block' ;
            $green= 'inline-block' ;
            $orange= 'inline-block' ;
            $yellow= 'inline-block' ;


            ?>
            @break
            @case(7)
            <?php
            $white='inline-block' ;
            $blue='inline-block' ;
            $lightblue='inline-block' ;
            $green= 'inline-block' ;
            $orange= 'inline-block' ;
            $yellow= 'inline-block' ;
            $red= 'inline-block' ;

            ?>
            @break;
            @case(8)
            @case(9)
            @case(10)
            @case(11)
            <?php
            $white='inline-block' ;
            $blue='inline-block' ;
            $lightblue='inline-block' ;
            $green= 'inline-block' ;
            $orange= 'inline-block' ;
            $yellow= 'inline-block' ;
            $red= 'inline-block' ;
            $black= 'inline-block' ;
            ?>
            @break
            @default
            Error
            @endswitch
            <ul id="temp_bar">
                <li class="white" style="display:{{$white}}"></li>
                <li class="blue" style="display:{{$blue}}"></li>
                <li class="lightblue" style="display:{{$lightblue}}"></li>
                <li class="green" style="display:{{$green}}"></li>
                <li class="yellow" style="display:{{$yellow}}"></li>
                <li class="orange" style="display:{{$orange}}"></li>
                <li class="red" style="display:{{$red}}"></li>
                <li class="black" style="display:{{$black}}"></li>

            </ul>


            <h2 class="font-weight-light mb-0">De zonnen sterkte is: <span class="signaal_uv">{{$laatsteSignaal->uv}}</span> / 8 om  <span class="signaal_created_at">"{{$laatsteSignaal->created_at}}"</span></h2>


            <br>








			@if(!empty($advies))
				<p>{{$advies->tekst}}</p>
			@endif
                <table class="table table-striped table-bordered">

                    <!--Table head-->
			@if(!empty($advies))
                <thead>
                    <tr>
                        <th>Zonnebrand advies</th>
                        <th>Advies Tijd</th>
                    </tr>
                </thead>
			@endif

                    <!--Table head-->

                    <!--Table body-->
                <tbody>
                @if($laatsteSignaal->uv <= 0.4)
                        <tr>
                            <td colspan="2">
                                U kunt onbeperkt onbeschermd zonnen
                            </td>
                        </tr>
                @else
                    <tr>

                        <td>Factor 10</td>
                        <td>{{$factoradvies10}}</td>
                    </tr>
                    <tr>

                        <td>Factor 20</td>
                        <td>{{$factoradvies20}}</td>
                    </tr>
                    <tr>

                        <td>Factor 30</td>
                        <td>{{$factoradvies30}}</td>
                    </tr>
                    <tr>

                        <td>Factor 50</td>
                        <td>{{$factoradvies50}}</td>
                    </tr>
                @endif

                @if(isset($eerste_userhistory_vandaag))
                    <tr>
                        <td colspan="2">
                            De eerste meting van vandaag is:  {{ $eerste_userhistory_vandaag }}. <br>
                            De gemiddelde UV-straling vandaag is {{$gemiddelde_uv_straling}}.
                        </td>
                    </tr>
                @endif

                </tbody>
            </table>






    <!--
        <span class="signaal_created_at">{{$laatsteSignaal->created_at}}</span>
        <span >{{$user->huidtype}}</span>
        <span class="signaal_uv_groot">{{ round($laatsteSignaal->uv) }}</span>
        <p class="message">Zonnensterkte: <span class="signaal_uv" class="highlight">{{$laatsteSignaal->uv}}</span> / 8</p>
        <p class="message">Uw geschiedenis?<a href="{{ route('userHistory') }}"> bekijk. </a> </p>
        <p class="message">Ander huidtype?<a href="{{ route('vragenlijst') }}"> Vul vragenlijst in. </a> </p>
        <p class="message">Uitloggen? <a href="{{ url('/logout') }}"> logout </a> </p>
        <a href="{{ route('vragenlijst') }}">Stel je huidtype in</a>
        <
        Uw huidtype is: {{$user->huidtype}}
        <h1>{{ $laatsteSignaal->uv }} /11</h1>
        tijd:
        <h2> {{ $laatsteSignaal->created_at }} </h2>
    -->






@endsection
