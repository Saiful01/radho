@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">

                @if(Session::has('success'))
                    <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('success') }}</p>
                @endif

                @if(Session::has('failed'))
                    <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('failed') }}</p>
                @endif

                <form method="post" action="/admin/ingredient/update" enctype='multipart/form-data'>
                    <div class="form-group row">
                        <div class="col-md-3">
                            <label>Name:</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="ingred_name" value="{{$result->ingred_name}}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                            <input type="hidden" name="ingred_id" value="{{$result->ingred_id}}">
                        </div>
                        
                    </div>
                    <div class="form-group row">
                        <div class="col-md-3">
                            <label>Ingredient Quantity:</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="ingred_quantity" value="{{$result->ingred_quantity}}">
                            
                        </div>

                        

                  

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>


            </div>
        </div>
    </div>


@endsection
