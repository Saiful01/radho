@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-body">


                @if(Session::has('success'))
                    <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('success') }}</p>
                @endif

                @if(Session::has('failed'))
                    <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('failed') }}</p>
                @endif

                <form method="post" action="/admin/recipe/store" enctype='multipart/form-data'>
                    <div class="form-group row">
                        <div class="col-md-3">
                            <label>Recipe Name:</label>
                        </div>

                        <div class="col-md-9">
                            <input type="text" class="form-control" name="recipe_title" required>
                            <input type="hidden" name="_token" value="{{{ csrf_token() }}}"/>
                        </div>


                    </div>
                    <div class="form-group row">
                        <div class="col-md-3">
                            <label>Recipe Image:</label>
                        </div>

                        <div class="col-md-9">
                            <input type="file" class="form-control" name="recipe_img" >
                            
                        </div>


                    </div>
                    <div class="form-group row">
                        <div class="col-md-3">
                            <label>Category Name:</label>
                        </div>

                        <div class="col-md-9">
                                 <select class="form-control" name="cat_id">
                                    @foreach($result as $res)

                                    <option value="{{$res->cat_id}}">{{$res->cat_name}}</option>
                                    @endforeach
                                    
                                    </select>
                        </div>



                    </div>

                    <button type=" submit" class="btn btn-primary">Save</button>
                </form>


            </div>
        </div>
    </div>



    
@endsection
