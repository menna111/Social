<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends BackEndController
{
    public function index(){
        return view('BackEnd.home');
    }
}
