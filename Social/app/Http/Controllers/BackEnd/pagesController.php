<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\pages\store;
use App\Models\page;
use App\Traits\ResponseTrait;


class pagesController extends BackEndController
{
    use ResponseTrait;

    public function index(){
        $pages=page::paginate(10);
        return view('BackEnd.pages.index',compact('pages'));
    }
    public function create(){
        return view('BackEnd.pages.create');
    }

    public function store(store $request){

        try {
            page::create([
                'name' => $request['name'],
                'description'=>$request['description'],
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
        $page=page::whereId($id)->first();
        return view('BackEnd.pages.edit',compact('page'));
    }

    public function update(store $request,$id){

        $page=page::whereId($id)->first();




        try {
            $page->update([
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
        $page=page::whereId($id)->first();
        if (is_null($page)){
            return $this->returnError('there is no user',404);
        }
        $page->delete();
        return $this->returnSuccess('deleted successfully',200);
    }
}
