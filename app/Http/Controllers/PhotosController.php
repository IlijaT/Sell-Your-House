<?php

namespace App\Http\Controllers;

use App\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PhotosController extends Controller
{
     
 

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Photo $photo)
    {

        if (Gate::denies('upload-photo', $photo->flyer)) {
            abort(403, 'You have no permission to delete photos');
        }
        
        
        $photo->delete();

        return back();
    }
}
