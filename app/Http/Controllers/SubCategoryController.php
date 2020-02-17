<?php

namespace App\Http\Controllers;

use App\SubCategory;
use App\Category;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
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
        $result = Category::get();
        return view('admin.subcategory.create')->with('result',$result);
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
            

            SubCategory::create($request->all());
            return back()->with('success',"successfully saved");
        } catch(\Exception $exception){

            return back()->with('failed',$exception->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function show(SubCategory $subCategory)
    {
        return view('admin.subcategory.view')->with('result',SubCategory::get());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function edit($sub_cat_id)
    {
        $result = SubCategory::where('sub_cat_id',$sub_cat_id)->first();
        return view ('admin.subcategory.edit')->with('result',$result);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubCategory $subCategory)
    {
        unset($request['_token']);
        try {
            SubCategory:: where('sub_cat_id' , $request['sub_cat_id'])->update($request->all());
            return back()->with('success',"Successfully Updated");
        } catch (\Exception $exception){
            return back()->with('Failed',$exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            SubCategory::where('sub_cat_id',$id)->delete();
            return back()->with('Success',"Successfully Deleted");
        } catch(\Exception $exception){
            return back()->with('Failed',$exception->getMessage());
        }
    }
}
