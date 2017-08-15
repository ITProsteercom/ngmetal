<?php

namespace App;


use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class Photo extends Model
{

	protected $table = 'files';
    public $timestamps = false;
    public $resizeImage;

    private $resizeWidth = 50;
    private $resizeHeight = null;


    public function application()
    {
        return $this->belongsTo(Application::class);
    }


    /**
     * Resize image and store it to the storage
     *
     * @return mixed
     */
    public function resizeImage() {

        //get original file
        $imagePath = Storage::disk('public')->path($this->path);

        //resize file with auto width/height
        $image = Image::make($imagePath)->resize($this->resizeWidth, $this->resizeHeight, function ($constraint) {
            $constraint->aspectRatio();
        })->encode();

        $imgResizePath = "resize/" .$this->path;

        //store resized file to the storage
        if( Storage::disk('public')->put($imgResizePath, $image) ) {
            $imageResizePath = Storage::url($imgResizePath);
        }

        return $this->resizeImage = $imageResizePath;
    }
}
