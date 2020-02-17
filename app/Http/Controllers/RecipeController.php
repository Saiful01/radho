<?php

namespace App\Http\Controllers;

use App\Recipe;
use App\Category;
use Illuminate\Http\Request;

class RecipeController extends Controller
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
        
        $result = Category::get();
        return view('admin.recipe.create')->with('result',$result);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->hasFile('recipe_img')) {

    
            $image = $request->file('recipe_img');
            $image_name = time() . '.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images/recipe');
            $image->move($destinationPath,$image_name);
            $array= [

                'recipe_title'=>$request['recipe_title'],
                'cat_id'=>$request['cat_id'],
                'recipe_img'=>$image_name,
               
            ];
        }else{
            $array= [

                'recipe_title'=>$request['recipe_title'],
                'cat_id'=>$request['cat_id'],
              
            ];


        }
        try {
            Recipe::create($array);
            return back()-> with('success',"Successfully Saved");
        }catch(\Exception $exception) {

            return back()->with('failed',$exception->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function show(Recipe $recipe)

    {
        $result = Category::get();
        return view('admin.recipe.view')->with('result',Recipe::get());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function edit( $recipe_id)
    {
        $result = Recipe::where('recipe_id',$recipe_id)->first();
        return view ('admin.recipe.edit')->with('result',$result);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Recipe $recipe)
    {
        if ($request->hasFile('recipe_img')) {

    
            $image = $request->file('recipe_img');
            $image_name = time() . '.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images/recipe');
            $image->move($destinationPath,$image_name);
            $array= [

                'recipe_title'=>$request['recipe_title'],
                'cat_id'=>$request['cat_id'],
                'recipe_img'=>$image_name,
               
            ];
        }else{
            $array= [

                'recipe_title'=>$request['recipe_title'],
                'cat_id'=>$request['cat_id'],
              
            ];


        }
        try {
            Recipe::create($array);
            return back()-> with('success',"Successfully updated");
        }catch(\Exception $exception) {

            return back()->with('failed',$exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recipe $recipe)
    {
        try {
            Recipe::where('recipe_id',$id)->delete();
            return back()->with('Success',"Successfully Deleted");
        } catch(\Exception $exception){
            return back()->with('Failed',$exception->getMessage());
        }
    }
}
