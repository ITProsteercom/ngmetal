<?php

namespace App;


use App\Events\ApplicationOnDelete;


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


    public function addFile($original_name, $path) {

        $this->files()->create(
            compact(['original_name', 'path'])
        );
    }
}
