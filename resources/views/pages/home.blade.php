@extends('layouts.app')

@section('content')

    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
        <h1 class="display-4"> Sell Your House - Home Page</h1>
        <p class="lead">The sale of a significant home is truly noteworthy. 
        To represent a home of distinction requires highly-qualified real estate professionals with global reach and local expertise. 
        Founded in 1976, the our brand is a unique and distinctive network of brokerage agencies offering a wide selection of luxury homes, estates and properties for sale throughout the world. Connect with a local affiliate today to list your home, condo, villa or other property, or to find the perfect home to match your lifestyle.</p>
        <a href="/flyers/create" type="button" class="btn btn-lg btn-block btn-outline-primary">Create a Flyer</a>
    </div>
    
    <div class="row">
        @foreach($flyers as $flyer)
                <div class="col-sm-6">
                    <a href="/{{ $flyer->zip}}/{{ $flyer->getParcedStreet() }}">
                        <div class="card bg-light mb-3" >
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $flyer->city }}, {{ $flyer->street }} </h5>
                                        <p class="card-text">{!! $flyer->price !!}</p>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <img class="card-img-top" src="storage/{{$flyer->photos()->first()->path}}" alt="No image">
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
        @endforeach
        {{ $flyers->links() }}
    </div>

    

@endsection