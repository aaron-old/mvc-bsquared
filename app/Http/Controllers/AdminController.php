<?php

namespace Bsquared\Http\Controllers;

use Illuminate\Http\Request;

use Bsquared\Http\Requests;

class AdminController extends Controller
{
    public function __construct(){
        $this->middleware('admin');
    }
    public function index(){
        // return Auth::guard('admin')->user();
        return view('admin.dashboard');
    }
}
