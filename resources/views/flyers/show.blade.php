@extends('layouts.app')

@section('content')
<div class="container">
    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-autor">
        <h4 class="display-4"> {{ $flyer->street}}</h4>
        <h4 class="display-4">  {!!  $flyer->price !!}</h4>
    </div>
    <hr>
    <div class="description">
        {!! nl2br($flyer->description) !!}
    </div>
     
</div>
@endsection