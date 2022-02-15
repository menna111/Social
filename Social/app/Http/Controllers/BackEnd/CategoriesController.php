<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\categories\store;
use App\Models\category;
use App\Models\User;
use App\Traits\ResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CategoriesController extends BackEndController
{
    use ResponseTrait;

    public function index(){
        $categories=category::paginate(10);
        return view('BackEnd.categories.index',compact('categories'));
    }
    public function create(){
        return view('BackEnd.categories.create');
    }

    public function store(store $request){

        try {
            category::create([
                'name' => $request['name'],
                'meta_keywords' => $request['meta_keywords'],
                'meta_description' => $request['meta_description'],
            ]);

            return $this->returnSuccess('added successfully',200);
        }catch (\Exception $exception){

            dd($exception->getMessage());
            return $this->returnError('some thing wrong',400);
        }
    }

    public function edit($id){
        $category=category::whereId($id)->first();
        return view('BackEnd.categories.edit',compact('category'));
    }

    public function update(store $request,$id){

        $category=category::whereId($id)->first();




        try {
            $category->update([
                'name' => $request['name'],
                'meta_keywords' => $request['meta_keywords'],
                'meta_description' => $request['meta_description'],
            ]);

            return $this->returnSuccess('updated successfully',201);
        }catch (\Exception $exception){

            dd($exception->getMessage(), $request->all());
            return $this->returnError('some thing wrong',400);
        }
    }

    public  function delete($id){
        $category=category::whereId($id)->first();
        if (is_null($category)){
            return $this->returnError('there is no user',404);
        }
        $category->delete();
        return $this->returnSuccess('deleted successfully',200);
    }
}
