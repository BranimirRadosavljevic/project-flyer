@extends('layout')

@section('content')
    <div class="row">
        <div class="col-md-4">
            <h1>{{ $flyer->street }}</h1>
            <h2>{{ $flyer->price }}</h2>
        
            <hr>
            
            <div class="description">
                {!! nl2br($flyer->description) !!}
            </div>
        </div>

        <div class="col-md-8">
            @foreach ($flyer->photos->chunk(4) as $set)
            <div class="row">
                @foreach ($set as $photo)
                    <div class="col-md-3 mb-3 clearfix">
                        <form action="/photos/{{$photo->id}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-secondary float-right">&times;</button>
                        </form>
                        <a href="{{asset($photo->path)}}" data-lity>
                            <img src="{{ asset($photo->thumbnail_path) }}" alt="">
                        </a>
                    </div>
                @endforeach
            </div>
            @endforeach
            <hr>
            @if (auth()->user() && auth()->user()->owns($flyer))
                
            <div class="pb-4">
                <form id="addPhotosForm" action="{{route('store_photo', [$flyer->zip, $flyer->street])}}" method="POST" class="dropzone">
                    @csrf
                </form>
            </div>
            @endif
        </div>
    </div>

    <hr>

    

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