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
</div>

@endsection
