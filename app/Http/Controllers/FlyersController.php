<?php

namespace App\Http\Controllers;

use App\Flyer;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use App\Http\Requests\FlyerRequest;
use Illuminate\Support\Facades\Gate;

class FlyersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show']]);
    }
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
        $flyer = auth()->user()->publishFlyer(
            new Flyer($request->all())
        );

        flash()->success('Success!', 'Your flyer has been created');
        
        return redirect($flyer->zip.'/'.str_replace(" ", "-", $flyer->street));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Flyer  $flyer
     * @return \Illuminate\Http\Response
     */
    public function show($zip, $street)
    {
        $flyer = Flyer::locatedAt($zip, $street);

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
        $flyer = Flyer::locatedAt($zip, $street);

        if (Gate::denies('upload-photo', $flyer)) {
            abort(403, 'You have no permission to add photos');
        }
        request()->validate(['photo' => 'required|mimes:jpg,jpeg,png,bmp']);

        $file = request()->file('photo')->store('public');
        
        
        $flyer->photos()->create([
            'path' => $file
        ]);


        return $file;
    }
}
