<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;
use Validator;

class SettingsController extends Controller
{
    public function __construct() {

        $this->middleware('auth');
    }

    public function index() {

        $settings = Setting::all();

        return view('admin.settings', compact('settings'));
    }

    public function update(Request $request, $id) {

        $setting = Setting::findOrFail($id);

        //trim all values
        $value = array_filter($request->get("value")[$id]);

        $rules = 'required';

        //check multiple fields for emptiness to exclude from validation
        if($setting->isMultiple) {
            foreach ($request->get("value")[$id] as $key => $input)
                if (empty($input))
                    $except[] = "value.$id.$key";
        }

        if($setting->isEmail)
            $rules .= "|email";

        //get request for validation
        if(!empty($except))
            $request = $request->except($except);
        else
            $request = $request->all();

        //validate
        $validator = Validator::make(
            $request,
            ["value.$id.*"  => $rules],
            ['required' => 'The :attribute field is required.'],
            ["value.$id.*" => Setting::find($id)->name]
        );

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $setting->update(['value' => $value]);

        return redirect()->back();
    }
}
