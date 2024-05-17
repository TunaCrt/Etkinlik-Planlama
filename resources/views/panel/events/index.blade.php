@extends('panel.layout.app')
@section('content')
    <a href="{{route('panel.event.create')}}" class="btn btn-success m-3">Etkinlik Oluştur</a>

    @foreach($events as $event)
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

                    <a href="{{ route("panel.event.destroy",$event->id) }}" class="m-3 btn btn-danger">Sil</a>
                    <a href="{{ route("panel.event.destroy",$event->id) }}" class="m-3 btn btn-warning">Güncelle</a>
                    <a href="{{route("panel.event.show",$event->id)}}" class="m-3 btn btn-primary">Detay</a>
                </div>
        </div>

    @endforeach

@endsection
