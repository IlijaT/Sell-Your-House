@extends('layouts.app')

@inject('countries', 'App\Http\Utilities\Country')

@section('content')
<div class="container">
    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
        <h1 class="display-4"> Selling your home?</h1>
    </div>

    <div class="row">
        <form method="POST" action="/flyers" enctype="multipart/form-data" class="col-md-6">
            @include('errors')
            @csrf
            @include('flyers.form')
        </form>
    </div>
</div>
@endsection