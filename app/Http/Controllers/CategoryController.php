<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
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
        return view ('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
            try{
                Category::create($request->all());
    
                return back()->with('success',"Successfylly Saved");
            }catch(\Exception $exception){
    
                return back()->with('failed',$exception->getMessage());
    
            }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('admin.category.view')->with('result', Category::get());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($cat_id)

    {
       // return $cat_id;
        $result = Category::where('cat_id', $cat_id)->first();
        return view('admin.category.edit')->with('result', $result);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        unset($request['_token']);
        try {

            Category::where('cat_id', $request['cat_id'])->update($request->all());
            return back()->with('success', "Successfully Updated");

        }catch(\Exception $exception){

            return back()->with('failed',$exception->getMessage());

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        try {

            Category::where('cat_id', $id)->delete();
            return back()->with('success', "Successfully Deleted");
        } catch (\Exception $exception) {


            return back()->with('failed', $exception->getMessage());
        }
    }
}
