@extends('layouts.layout')

@section('content')
    <div class="content">


    <h1> Zie hieronder voor mooie grafiekjes 🌚 </h1>

<?php



//
//        dd($datumsInDatabase)
//
//        ?>
        @for ($i = 0; $i < count($datumsInDatabase); $i++)
            @foreach($datumsInDatabase[$i] as $datum)
                {{$datum}}
                <br />
            @endForeach

                {{--@foreach($waardesBijDatumsDatabase[$i] as $waarde)--}}
                    {{--<p>{{$waarde}}</p>--}}
                {{--@endForeach--}}
        @endfor



    <div id="poll_div"></div>
    </div>
    @linechart('Votes', 'poll_div')
@endsection