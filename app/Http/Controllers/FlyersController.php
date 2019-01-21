<?php

namespace App\Http\Controllers;

use App\Flyer;
use Illuminate\Http\Request;
use App\Http\Requests\FlyerRequest;

class FlyersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('flyers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FlyerRequest $request)
    {
        //Flyer::create($request->all());

        auth()->user()->publishFlyer(
            new Flyer([
                'street' => $request->street,
                'city' => $request->city,
                'zip' => $request->zip,
                'country' => $request->country,
                'price' => $request->price,
                'description' => $request->description,
            ])
        );
        flash()->success('Success!', 'Your flyer has been created');
        
        // temporary
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Flyer  $flyer
     * @return \Illuminate\Http\Response
     */
    public function show($zip, $street)
    {
        $flyer = Flyer::locatedAt($zip, $street)->first();

        return view('flyers.show', compact('flyer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Flyer  $flyer
     * @return \Illuminate\Http\Response
     */
    public function edit(Flyer $flyer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Flyer  $flyer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Flyer $flyer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Flyer  $flyer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Flyer $flyer)
    {
        //
    }

    public function addPhoto($zip, $street)
    {
        $file = request()->file('file')->store('public');
        
        $flyer = Flyer::locatedAt($zip, $street)->first();
        
        $flyer->photos()->create([
            'path' => $file
        ]);

        return $file;
    }
}
