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

                <form method="post" action="/admin/ingredient/store" enctype='multipart/form-data'>
                    <div class="form-group row">
                        <div class="col-md-3">
                            <label>Ingredient Name:</label>
                        </div>

                        <div class="col-md-9">
                            <input type="text" class="form-control" name="ingred_name" required>
                            <input type="hidden" name="_token" value="{{{ csrf_token() }}}"/>
                        </div>


                    </div>
                    <div class="form-group row">
                        <div class="col-md-3">
                            <label>Ingredient Quantity:</label>
                        </div>

                        <div class="col-md-9">
                            <input type="text" class="form-control" name="ingred_quantity" >
                            
                        </div>


                    </div>
                    <div class="form-group row">
                        <div class="col-md-3">
                            <label>Recipe Name:</label>
                        </div>

                        <div class="col-md-9">
                                 <select class="form-control" name="recipe_id">
                                    @foreach($result as $res)

                                    <option value="{{$res->recipe_id}}">{{$res->recipe_title}}</option>
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
