<?php

namespace App\Http\Controllers;

use App\Application;
use Illuminate\Http\Request;

class FileController extends Controller
{
    public function store(Application $application)
    {
        $application->addFile($o);
        File::create([
            'application_id' => $application->id,
            'path' =>
            'original_name' =>
        ]);
    }
}
