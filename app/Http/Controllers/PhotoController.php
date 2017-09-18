<?php

namespace App\Http\Controllers;

use App\Application;
use App\Photo;
use Illuminate\Http\Request;

class PhotoController extends Controller
{

    public function store(Request $request)
    {
    	$id = [];

    	$files = $request->file('files');
        foreach ($files as $key => $file) {

            //save files ti the storage
            $path = $file->store('public');

            $photo = Photo::create([
            	'original_name' => $file->getClientOriginalName(),
            	'path' => basename($path),
            ]);

            $id[] = $photo->id;
        }

        return json_encode(['id' => $id]);
    }
}
