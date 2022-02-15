<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\tags\store;
use App\Models\tag;
use App\Traits\ResponseTrait;


class tagsController extends BackEndController
{
    use ResponseTrait;

    public function index(){
        $tags=tag::paginate(10);
        return view('BackEnd.tags.index',compact('tags'));
    }
    public function create(){
        return view('BackEnd.tags.create');
    }

    public function store(store $request){

        try {
            tag::create([
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
        $tag=tag::whereId($id)->first();
        return view('BackEnd.tags.edit',compact('tag'));
    }

    public function update(store $request,$id){

        $tag=tag::whereId($id)->first();




        try {
            $tag->update([
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
        $tag=tag::whereId($id)->first();
        if (is_null($tag)){
            return $this->returnError('there is no user',404);
        }
        $tag->delete();
        return $this->returnSuccess('deleted successfully',200);
    }
}
