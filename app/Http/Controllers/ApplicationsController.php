<?php

namespace App\Http\Controllers;

use App\Application;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ApplicationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $applications = Application::all();

        return view('applications.index', compact('applications'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'package_id' => 'required',
            'sent_date' => 'required',
            'reason_id' => 'required',
        ]);

        Application::create([
            'package_id' => intval($request->request->get('package_id')),
            'sent_date' => Carbon::createFromTimestamp(intval($request->request->get("sent_date")))->toDateTimeString(),
            'reason_id' => $request->request->get('reason_id'),
            'message' => $request->request->get('message'),
        ]);

        return view('layouts.success', ['message' => "Your application is successfully sent!"]);
    }
}
