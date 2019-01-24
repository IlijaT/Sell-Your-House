@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <h4 class="display-4"> {{ $flyer->street}}</h4>
            <h5 class="display-5">  {!!  $flyer->price !!}</h5>
            <h5 class="display-5"> tel:  {{ $flyer->phone }}</h5>
            <hr>
            <div class="description">
            {!! nl2br($flyer->description) !!}
            </div>
        </div>

        <div class="col-md-8 galery">
            @foreach($flyer->photos->chunk(4) as $set)
                <div class="row">
                    @foreach($set as $photo)
                        <div class="col-md-3 galery_image">
                            <a href='{{ asset("storage/$photo->path") }}' data-lity>
                                <img class="thumbnail" src='{{ asset("storage/$photo->path") }}' alt="slika">
                            </a>
                        </div>
                    @endforeach        
                </div>
            @endforeach

            @can('upload-photo', $flyer)
                <hr>
                <form id="myAwesomeDropzone" method="POST" action="/{{ $flyer->zip}}/{{ $flyer->street}}/photos"
                class="dropzone"
                id="my-awesome-dropzone">
                    @csrf  
                </form>
            @endcan
        </div>
    </div>

     
</div>
@endsection

@section('scripts.footer')
     <script src="{{ asset('js/lity.js') }}" defer></script>"> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.js"></script>
    <script>
        Dropzone.options.myAwesomeDropzone = {
            paramName: "photo", // The name that will be used to transfer the file
            maxFilesize: 3, // MB
            acceptedFiles: '.jpg, .jpeg, .bmp, .png',
            
        };
    </script>
@endsection