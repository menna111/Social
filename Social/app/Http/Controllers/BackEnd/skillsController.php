<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\skills\store;
use App\Models\skill;
use App\Traits\ResponseTrait;


class skillsController extends BackEndController
{
    use ResponseTrait;

    public function index(){
        $skills=skill::paginate(10);
        return view('BackEnd.skills.index',compact('skills'));
    }
    public function create(){
        return view('BackEnd.skills.create');
    }

    public function store(store $request){

        try {
            skill::create([
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
        $skill=skill::whereId($id)->first();
        return view('BackEnd.skills.edit',compact('skill'));
    }

    public function update(store $request,$id){

        $skill=skill::whereId($id)->first();




        try {
            $skill->update([
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
        $skill=skill::whereId($id)->first();
        if (is_null($skill)){
            return $this->returnError('there is no user',404);
        }
        $skill->delete();
        return $this->returnSuccess('deleted successfully',200);
    }
}
