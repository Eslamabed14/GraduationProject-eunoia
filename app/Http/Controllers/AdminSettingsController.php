<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class AdminSettingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index($id){
        $settings = Setting::find($id);
        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request, $id){
        $settings = Setting::find($id);

        $request->validate([
            'contact_us'    => ['required'],
            'terms'         => ['required'],
            'policies'      => ['required'],
            'about_us'      => ['required']
        ]);

        $settings->update($request->all());
        $settings->save();
        return redirect()->back()->with('message', 'Settings updated successfully');
    }
}
