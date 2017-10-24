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

        $value = array_filter($request->get("value")[$id]);

        $rules = 'required';

        if($setting->isEmail) {
            $rules .= "|email";

            $value = array_map(function($email) {
                return trim($email);
            }, $value);
        }

        $validator = Validator::make(
            $request->all(),
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
