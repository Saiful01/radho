<?php

namespace App\Http\Controllers;

use App\Ingredient;
use App\Recipe;
use Illuminate\Http\Request;

class IngredientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $result = Recipe::get();
        return view('admin.ingredient.create')->with('result',$result);
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
            

            Ingredient::create($request->all());
            return back()->with('success',"successfully saved");
        } catch(\Exception $exception){

            return back()->with('failed',$exception->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ingredient  $ingredient
     * @return \Illuminate\Http\Response
     */
    public function show(Ingredient $ingredient)
    {
        return view('admin.ingredient.view')->with('result',Ingredient::get());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ingredient  $ingredient
     * @return \Illuminate\Http\Response
     */
    public function edit( $ingred_id)
    {
        $result = Ingredient::where('ingred_id',$ingred_id)->first();
        return view ('admin.ingredient.edit')->with('result',$result);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ingredient  $ingredient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ingredient $ingredient)
    {
        try {
            

            Ingredient::create($request->all());
            return back()->with('success',"successfully updated");
        } catch(\Exception $exception){

            return back()->with('failed',$exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ingredient  $ingredient
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            Ingredient::where('ingred_id',$id)->delete();
            return back()->with('Success',"Successfully Deleted");
        } catch(\Exception $exception){
            return back()->with('Failed',$exception->getMessage());
        }
    }
}
