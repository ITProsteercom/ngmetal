<?php

namespace App\Http\Controllers;

use App\Exceptions\CustomException;
use App\Reason;
use Illuminate\Http\Request;

class AppController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = $request->query();

        try {
            if(!isset($query['p']) || !isset($query['d'])) {
                throw new CustomException(['bad_request']);
            }
        }
        catch(CustomException $e) {
            return view('layouts.errors.page', ['error' => $e->getMessage()]);
        }

        $reasons = Reason::All();

        return view('index', compact('query', 'reasons'));
    }
}
