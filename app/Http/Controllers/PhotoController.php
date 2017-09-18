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

        return json_encode([
            //'error' => '',
            'initialPreview' => ['/storage/'.$photo->path],
            'initialPreviewConfig' => [
                [
                    'caption' => $photo->original_name,
                    'width' => '120px',
                    'url' => '/fileremove/'.$photo->id, // server delete action
                    'key' => '0',
                    'size' => 1232,
                    //'extra' => ['id' => $id]
                ]
            ],
            //'append' => true,
            //'id' => $id,
        ]);
    }


    public function destroy($id)
    {
    	$file = Photo::findOrFail($id);
    	Storage::disk('public')->delete($file->path);
        
        return json_encode([
            'error' => '',
        ]);
    }
}
