@extends('layouts.layout')

@section('content')
    <div class="content">


    <h1> Zie hieronder voor mooie grafiekjes 🌚 </h1>


        <div class="dropdown">
            <button class="btn btn-warning dropdown-toggle" type="submit" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Selecteer datum
            </button>

            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                @for ($i = 0; $i < count($datumsInDatabase); $i++)
                    @foreach($datumsInDatabase[$i] as $datum)
                        <form method="post" action="{{route('veranderGrafiek')}}">
                            @csrf
                            <input class="dropdown-item" type="submit" value={{$datum}}>
                            <input type="hidden" name="datum" value={{$datum}}>
                        </form>
                    @endForeach
                @endfor
            </div>

        </div>
        <hr>


    <div id="poll_div"></div>
    </div>
    @linechart('Votes', 'poll_div')
@endsection