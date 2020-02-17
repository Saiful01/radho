@extends('layouts.app')


@section('content')
<style>

.btn-big {
    height: 139px;
    line-height: 110px;
    font-size: 38px;
}

</style>


<div class="container mt-5">

    <div class="row justify-content-center"> 
        <div class="col-md-4">
            <a href="/admin/category/view" class="btn btn-primary btn-big btn-block">
                Category

            </a>
        </div>
        <div class="col-md-4">
            <a href="/admin/subcategory/view" class="btn btn-secondary btn-big btn-block">
                Sub Category

            </a>
        </div>
        <div class="col-md-4">
            <a href="/admin/recipe/view" class="btn btn-info btn-big btn-block">
                Recipe

            </a>
        </div>
        </div>
        <br>
        <div class="row justify-content-center"> 
        
        <div class="col-md-4">
            <a href="/admin/ingredient/view" class="btn btn-success btn-big btn-block">
                Ingredient

            </a>
            </div>
        
        <div class="col-md-4">
            <a href="/admin/recipe_preparation/view" class="btn btn-danger btn-big btn-block">
                 Preparation

            </a>
        </div>
        
        </div>

        </div>
        </div>
        </div>

        @endsection
