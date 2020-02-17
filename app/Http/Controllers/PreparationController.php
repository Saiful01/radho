<?php

namespace App\Http\Controllers;

use App\Preparation;
use App\Recipe;
use Illuminate\Http\Request;

class PreparationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $result = Recipe::get();
        return view('admin.recipe_preparation.create')->with('result',$result);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            

            Preparation::create($request->all());
            return back()->with('success',"successfully saved");
        } catch(\Exception $exception){

            return back()->with('failed',$exception->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Preparation  $preparation
     * @return \Illuminate\Http\Response
     */
    public function show(Preparation $preparation)
    {
        return view('admin.recipe_preparation.view')->with('result',Preparation::get());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Preparation  $preparation
     * @return \Illuminate\Http\Response
     */
    public function edit( $pre_id)
    {
        $result = Preparation::where('pre_id',$pre_id)->first();
        return view ('admin.recipe_preparation.edit')->with('result',$result);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Preparation  $preparation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Preparation $preparation)
    {
        try {
            

            Preparation::create($request->all());
            return back()->with('success',"successfully updated");
        } catch(\Exception $exception){

            return back()->with('failed',$exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Preparation  $preparation
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        try {
            Preparation::where('pre_id',$id)->delete();
            return back()->with('Success',"Successfully Deleted");
        } catch(\Exception $exception){
            return back()->with('Failed',$exception->getMessage());
        }
    }
}
