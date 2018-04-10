@extends('layouts.layout')

@section('content')



    <form method='post' action="{{ route('voerVragenlijstIn') }}">
        @csrf
        @foreach ($quizvragen as $quizvraag)<!---------quizvragen looped uit db------->
            <div class="tekstvragen">
                <p class="message">{{$quizvraag->vraag}}</p>
            </div>
            <ul class="antwoorden" style="list-style-type: none;">
                @foreach($quizvraag->quizAntwoord as $antwoorden) <!-------antwoorden looped uit db--------->
                    <li>
                        <input type="radio" name="{{$quizvraag->id}}" id="{{$antwoorden->id}}" value="{{$antwoorden->letter}}">
                        <label for="{{$antwoorden->id}}">  {{$antwoorden->tekst}}</label>
                    </li>
                @endforeach
            </ul>
        @endforeach
        <button type="submit">Voer in</button> <!---------form submit om huidtype op te slaan------->
    </form>



@endsection
