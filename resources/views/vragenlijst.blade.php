@extends('layouts.layout')

@section('content')


<div class="containervragen">
    <form method='post' action="{{ route('voerVragenlijstIn') }}">
        @csrf
        @foreach ($quizvragen as $quizvraag)
            <div class="tekstvragen">
                <p class="message">{{$quizvraag->vraag}}</p>
            </div>
            <ul style="list-style-type: none;">
                @foreach($quizvraag->quizAntwoord as $antwoorden)
                    <li>
                        <input type="checkbox" name="{{$antwoorden->id}}" id="test{{$antwoorden->id}}" value="{{$antwoorden->quiz_vraag_id}}">
                        <label for="test{{$antwoorden->id}}"> {{$antwoorden->letter}}, {{$antwoorden->tekst}}</label>
                    </li>
                @endforeach
            </ul>
        @endforeach
        <button type="submit">Voer in</button>
    </form>
</div>


@endsection
