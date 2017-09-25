<?php

namespace App\Http\Controllers;


use App\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{

    public function store(Request $request)
    {
    	$id = [];
        $initialPreview = [];
        $initialPreviewConfig = [];

    	$files = $request->file('files');
        foreach ($files as $key => $file) {

            //save files ti the storage
            $path = $file->store('public');

            $photo = Photo::create([
            	'original_name' => $file->getClientOriginalName(),
            	'path' => basename($path),
            ]);

            $id[] = $photo->id;
            $initialPreview[] = Storage::url($path);
            $initialPreviewConfig[] = [
                'caption' => $photo->original_name,
                'url' => '/fileremove/'.$photo->id, // server delete action
                //'key' => $key,
                'size' => Storage::size($path),
                //'extra' => ['id' => $photo->id]
            ];

        }

        return json_encode([
            'error' => '',
            'initialPreview' => $initialPreview,
            'initialPreviewConfig' => $initialPreviewConfig,
            //'append' => true,
            'id' => $id,
        ]);
    }


    public function destroy($id)
    {
    	$file = Photo::findOrFail($id);
    	Storage::disk('public')->delete($file->path);
    	$file->delete();
        
        return json_encode([
            'error' => '',
            'id' => $id,
        ]);
    }
}
