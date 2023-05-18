<?php

namespace App\Http\Controllers;

use App\Models\Lifestyle;
use Illuminate\Http\Request;

class AdminLifestyleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $lifestyles = Lifestyle::all();
        return view('admin.lifestyles.index', compact('lifestyles'));
    }
}
