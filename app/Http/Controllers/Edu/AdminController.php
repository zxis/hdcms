<?php

namespace App\Http\Controllers\Edu;

use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    public function index(){
        return view('edu.admin');
    }
}