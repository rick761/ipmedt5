@extends('layouts.app')

@section('content')
<div class="container">
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



                        @foreach($UserHistory as $UserHistoryItem)
                                <p> UserHistoryItem: </p>
                                <p> {{ $UserHistoryItem }}</p>
                                <p> <?php var_dump($UserHistoryItem->OntvangenSignaal ); ?> </p>
                                <p></p>
                            <br><br>
                        @endforeach
                        @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
                        <br>

                        @foreach($OntvangenSignalen as $Signaal)

                            <p> ontvangensignaal: </p>
                            <p> {{$Signaal}}</p>
                            <p> <?php var_dump($Signaal->UserHistorys); ?> </p>
                            <br><br>
                        @endforeach




                </div>
            </div>
        </div>
    </div>
</div>
@endsection
