@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <h4 class="display-4"> {{ $flyer->street}}</h4>
            <h4 class="display-4">  {!!  $flyer->price !!}</h4>
            <hr>
            <div class="description">
            {{ nl2br($flyer->description) }}
            </div>
        </div>
        <div class="col-md-9">
            @foreach($flyer->photos as $photo)
                <img src='{{ asset("storage/$photo->path") }}' alt="slika">
            @endforeach        
        </div>
    </div>
    <hr>
    <h2>Upload Your Photos</h2>
    <form id="myAwesomeDropzone" method="POST" action="/{{ $flyer->zip}}/{{ $flyer->street}}/photos"
      class="dropzone"
      id="my-awesome-dropzone">
        @csrf  
    </form>
     
</div>
@endsection

@section('scripts.footer')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.js"></script>
    <script>
        Dropzone.options.myAwesomeDropzone = {
            paramName: "photo", // The name that will be used to transfer the file
            maxFilesize: 3, // MB
            acceptedFiles: '.jpg, .jpeg, .bmp, .png',
            
        };
    </script>
@endsection