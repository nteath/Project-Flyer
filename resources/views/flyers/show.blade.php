@extends('layouts.master')

@section('content')

    <div class="row">
        <div class="col-md-5">
            <h1>{{ $flyer->street }} - {{ $flyer->city }}</h1>
            <h2>{{ $flyer->price }}</h2>

            <hr/>

            <p>{!! nl2br($flyer->description) !!}</p>
        </div>

        <div class="col-md-7 gallery">
            @foreach($flyer->photos->chunk(4) as $set)
                <div class="row">
                    @foreach($set as $photo)
                        <div class="col-md-3 gallery__image">
                            <img src="{{ asset($photo->tn_path) }}" alt=""/>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>

    <hr/>

    @if($signedIn && $currentUser->owns($flyer))
        <div class="row">
            <h2 class="text-center">Add your photos</h2>

            {{--DROPZONE--}}
            <form action="/{{ $flyer->zip }}/{{ $flyer->street }}/photos" method="post" class="dropzone">
                <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
            </form>
        </div>
    @endif

@stop

@section('footer-scripts')
    <script>
        Dropzone.options.addPhotosForm = {
            maxFileSize: 10,
            acceptedFiles: '.jpg, .jpeg, .png, .bmp'
        };
    </script>
@endsection