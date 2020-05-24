@extends('layout')

@section('content')
    <div class="row">
        <div class="col-md-3">
            <h1>{{ $flyer->street }}</h1>
            <h2>{{ $flyer->price }}</h2>
        
            <hr>
            
            <div class="description">
                {!! nl2br($flyer->description) !!}
            </div>
        </div>

        <div class="col-md-9">
            @foreach ($flyer->photos as $photo)
                <img src="{{ $photo->path }}" alt="">
            @endforeach
        </div>
    </div>

    <hr>

    <h2>Add Your Photos</h2>

    <form id="addPhotosForm" action="{{route('store_photo', [$flyer->zip, $flyer->street])}}" method="POST" class="dropzone">
        @csrf
    </form>
@endsection

@section('scripts.footer')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/dropzone.js"></script>
    <script>
        Dropzone.options.addPhotosForm = {
            paramName: 'photo',
            maxFilesize: 3,
            acceptedFiles: '.jpg, .jpeg, .png, .bmp'
        };
    </script>
@endsection