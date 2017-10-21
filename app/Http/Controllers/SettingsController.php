<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;

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

        $rules = 'required';
        if($setting->isEmail)
            $rules .= "|email";

        $this->validate(
            $request,
            ['value' => $rules],
            ['required' => 'The :attribute field is required.'],
            ['value' => Setting::find($id)->name]
        );

        $setting->update([ 'value' => $request->get('value')]);

        return redirect()->back();
    }
}
