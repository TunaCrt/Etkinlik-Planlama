@extends('panel.layout.app')
@section('content')
    <a href="{{route('panel.event.index')}}" class="btn btn-success m-3">Etkinlikler sayfasına git</a>

        <div class="row">

            <div class="col-2">
                <img src="{{asset("Events/Photos/".$event->photo)}}" height="80">
            </div>
            <div class="col-10">
                <h5 class="card-title">{{$event->name}}</h5>
                <p class="card-text">
                    {{$event->description}}
                </p>
                <p class="card-text"><small class="text-muted">{{$event->event_date}}</small></p>

            </div>

@endsection
