<?php

namespace App;


use App\Events\ApplicationOnDelete;
use Carbon\Carbon;


class Application extends Model
{
    public $timestamps = false;
    protected $events = [
        'deleting' => ApplicationOnDelete::class,
    ];


    public function files() {

        return $this->hasMany(Photo::class);
    }


    public function reason() {
        return $this->belongsTo(Reason::class);
    }

    public function sentDate() {
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->sent_date)->toDateString();
    }


    public function addFile($original_name, $path) {

        $this->files()->create(
            compact(['original_name', 'path'])
        );
    }

    public function relateFiles($files) {

        $photos = Photo::find($files);

        foreach ($photos as $photo) {

            $photo->application_id = $this->id;
            $photo->save();
        }
    }
}
