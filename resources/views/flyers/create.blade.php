@extends('layout')

@inject('countries', 'App\Http\Utilities\Country')

@section('content')

    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
        <h1 class="display-4"> Selling your home?</h1>
    </div>

    <form method="POST" action="/flyers" enctype="multipart/form-data">
        @include('flyers.form')
    </form>

@endsection