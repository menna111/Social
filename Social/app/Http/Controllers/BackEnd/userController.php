<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class userController extends BackEndController
{
    public function index(){
        $users=User::paginate(10);
        return view('backend.users.index',compact('users'));
    }
}
