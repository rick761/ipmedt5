@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> Vragenlijst voor je huidtype. </div>

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
                    <form method='post' action="{{ route('voerVragenlijstIn') }}">
                        @csrf
                        @foreach ($quizvragen as $quizvraag)
                            <p>{{$quizvraag->vraag}}</p>
                            <ul style="list-style-type: none;">
                                @foreach($quizvraag->quizAntwoord as $antwoorden)
                                    <li>
                                        <input type="checkbox" name="{{$antwoorden->id}}" value="{{$antwoorden->quiz_vraag_id}}">
                                        <label> {{$antwoorden->letter}}, {{$antwoorden->tekst}}</label>
                                    </li>
                                @endforeach
                            </ul>
                        @endforeach
                        <button type="submit" class="btn btn-primary btn-block">Voer in</button>
                    </form>



                </div>
            </div>
        </div>
    </div>
</div>
@endsection
