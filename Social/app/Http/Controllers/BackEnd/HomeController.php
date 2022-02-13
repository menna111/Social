<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Traits\ResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class HomeController extends BackEndController
{
    use ResponseTrait;

    public function index(){
        return view('BackEnd.home');
    }

    public function create(){
        return view('BackEnd.users.create');
    }

    public function store(Request $request){


        $request->validate([

            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],

        ]);
        try {
            User::create([
                'name' => $request['name'],
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
            ]);

            return $this->returnSuccess('added successfully',200);
        }catch (\Exception $exception){

            dd($exception->getMessage());
            return $this->returnError('some thing wrong',400);
        }
    }

    public function edit($id){
        $user=User::whereId($id)->first();
        return view('BackEnd.users.edit',compact('user'));
    }

    public function update(Request $request,$id){

        $user=User::whereId($id)->first();
        $request->validate([

            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users,id,'.Auth::id()],
            'password' => ['required', 'string', 'min:8'],

        ]);
        try {
           $user->update([
                'name' => $request['name'],
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
            ]);

            return $this->returnSuccess('updated successfully',201);
        }catch (\Exception $exception){

            dd($exception->getMessage());
            return $this->returnError('some thing wrong',400);
        }
    }
}
