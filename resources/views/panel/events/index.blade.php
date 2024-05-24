@extends('panel.layout.app')
@section('content')
    <a href="{{route('panel.event.create')}}" class="btn btn-success m-3">Etkinlik Oluştur</a>

    @foreach($events as $event)
        <div class="row mb-5">
            <div class="col-md">
                <div class="card mb-3">
                    <div class="row g-0">
                        <div class="col-md-2">
                            <img src="{{asset("Events/Photos/".$event->photo)}}" height="175" style="max-width: 210px; object-fit: cover;">
                        </div>
                        <div class="col-md-10">
                            <div class="card-body">
                                <h2 class="card-title">{{$event->name}}</h2>
                                <p class="card-text">
                                    {{$event->description}}
                                </p>
                                <p class="card-text"><small class="text-muted">Etkinlik Tarihi: {{$event->event_date}} / Last updated {{$event->updated_at->diffForHumans()}}</small></p>

                                <div class="col-lg-3 col-sm-6 col-12" style="position: absolute; right: 0; top: 0;">
                                    <small class="text-light fw-semibold"></small>
                                    <div class="demo-inline-spacing">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-primary btn-icon rounded-pill dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end" style="">
                                                <li><a class="dropdown-item" href="{{route("panel.event.show",$event->id)}}">Detay</a></li>
                                                <li><a class="dropdown-item" href="{{ route("panel.event.destroy",$event->id) }}">Güncelle</a></li>
                                                <li>
                                                    <hr class="dropdown-divider">
                                                </li>
                                                <li><a class="dropdown-item" href="{{ route("panel.event.destroy",$event->id) }}">Sil</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach




@endsection
