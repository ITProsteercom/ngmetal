<?php

namespace App;


class Application extends Model
{
    public $timestamps = false;


    public function files() {

        return $this->hasMany(File::class);
    }


    public function addFile($name, $path) {

        $this->files()->create([
            'original_name' => $name,
            'path' => $path,
        ]);
    }
}
