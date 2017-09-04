<?php

namespace App\Http\Controllers;

use App\Application;
use App\Mail\ApplicationCreated;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class ApplicationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $applications = Application::with('reason')->get();
        $applications->load('files');

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
        //make validation
        $this->validate($request, [
            'package_id' => 'required',
            'sent_date' => 'required',
            'reason_id' => 'required',
        ]);

        //create an Application
        $application = Application::create([
            'package_id' => intval($request->request->get('package_id')),
            'sent_date' => Carbon::createFromFormat('dmY', $request->request->get("sent_date"))->toDateString(),
            'reason_id' => $request->request->get('reason_id'),
            'message' => $request->request->get('message'),
        ]);

        if(!$application) {
            //throw exception - application hasn't been saved
            throw new CustomException(['something_went_wrong']);
        }
        else {
            //check if file were sent through the form
            if($request->hasFile('files')) {

                $files = $request->file('files');

                foreach ($files as $key => $file) {

                    //save files ti the storage
                    $path = $file->store('public');

                    if($path) {
                        //add file to application
                        $application->addFile($file->getClientOriginalName(), basename($path));
                    }
                    else {
                        // throw exception - file hasn't been stored
                        throw new CustomException(['something_went_wrong']);
                    }
                }
            }

            //send emain to admin
            Mail::to(config('mail.ADMIN_EMAIL'))->send(new ApplicationCreated($application));

            //set sent to true if email sent successfully
            if(!Mail::failures()) {
                $application->sent = true;
                $application->save();
            }
        }

        return view('layouts.success', ['message' => "Your application is successfully sent!"]);
    }


    public function destroy($id)
    {
        $application = Application::findOrFail($id);
        $application->delete();

        return redirect()->route('applications.list');
    }


    /**
     * Relate stored file to an Application
     *
     * @param $original_name
     * @param $path
     */
    public function addFile($original_name, $path) {

       $this->files()->create(compact('original_name', 'path'));
    }
}
