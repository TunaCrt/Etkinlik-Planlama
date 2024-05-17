@extends('panel.layout.app')
@section('content')
    <form method="post" action="{{route("panel.event.store")}}" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-12">
                <label>
                    Etkinlik foto
                    <input type="file" name="photo" id="photo" class="form-control">
                </label>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <label>
                    name
                    <input type="name" name="name" id="title" class="form-control">
                </label>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <label>
                    Description
                    <textarea name="description" id="description" class="form-control">

                    </textarea>
                </label>
            </div>
        </div>
        <label for="defaultFormControlInput" class="form-label">Event_date</label>
        <input type="datetime-local" class="form-control" name="event_date">
        <div class="row mt-3">
            <div class="col-12">
                <input type="submit" class="btn btn-primary" name="submit" value="Submit">
            </div>
        </div>
    </form>

@endsection
