@extends('layouts.layout')

@section('content')



        <div class="dropdown">
            <button style="text-transform:uppercase;" class="btn  dropdown-toggle" type="submit" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Selecteer datum
            </button>

            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton"> <!-------dropdown om een datum te kiezen om geschiedenis van te tonen--------->
                @for ($i = 0; $i < count($datumsInDatabase); $i++)
                    @foreach($datumsInDatabase[$i] as $datum)
                        <form method="post" action="{{route('veranderGrafiek')}}">
                            @csrf
                            @if(Carbon\Carbon::parse($datum) == Carbon\Carbon::today())
                                <input class="dropdown-item" type="submit" value="vandaag">
                            @elseif(Carbon\Carbon::parse($datum) == Carbon\Carbon::yesterday())
                                <input class="dropdown-item" type="submit" value="gister">
                            @else
                                <input class="dropdown-item" type="submit" value="{{$datum}}">
                            @endif

                            <input type="hidden" name="datum" value={{$datum}}>
                        </form>
                    @endForeach
                @endfor
            </div>
        </div>
        </div> <!----------bericht die dag weergeeft van de geschiedenisTabel------>
            <p class="message">Geschiedenis

                @if(Carbon\Carbon::parse($huidige_datum)->isToday())
                vandaag:
                @elseif(Carbon\Carbon::parse($huidige_datum)->isYesterday())
                gister:
                @else
                    <span class="message">{{$huidige_datum}}</span>
                @endif



            </p>
        <!---------Tabel wordt weergegeven------->
            <div class="chart_container">
                <div id="poll_div"></div>

                @areachart('Geschiedenis', 'poll_div')
            </div>






@endsection