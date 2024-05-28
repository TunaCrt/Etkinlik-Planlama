@extends('panel.layout.app')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#city').change(function() {
                var cityId = $(this).val();

                // Üniversiteleri temizle
                $('#university').empty();
                $('#university').append('<option selected disabled value="">Lütfen Seçim Yapınız</option>');

                // AJAX isteği yap
                $.get('/universities/' + cityId, function(data) {
                    data.forEach(function(university) {
                        $('#university').append('<option value="' + university.id + '">' + university.name + '</option>');
                    });
                });
            });
        });
    </script>


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

        <label for="defaultFormControlInput" class="form-label">Şehirler:</label>
        <select name="city" id="city" class="form-control">
            <option selected disabled value="">Lütfen Seçim Yapınız</option>
            @foreach($cities as $city)
                <option value="{{$city->id}}">{{$city->name}}</option>
            @endforeach
        </select>

        <label for="defaultFormControlInput" class="form-label">Üniversiteler:</label>
        <select name="university" id="university" class="form-control">
            <option selected disabled value="">Lütfen Seçim Yapınız</option>
            @foreach($universities as $university)
                <option value="{{$university->id}}">{{$university->name}}</option>
            @endforeach
        </select>





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
