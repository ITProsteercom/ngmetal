<?php

namespace App;


class Application extends Model
{
    public $timestamps = false;


    public function files() {

        return $this->hasMany(Photo::class);
    }


    public function addFile($original_name, $path) {

        $this->files()->create(
            compact(['original_name', 'path'])
        );
    }
}
