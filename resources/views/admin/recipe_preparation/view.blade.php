@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="car-header custom-header">
        <h1> Recipe Table </h1>
            <a class="btn btn-success float-right" href="/admin/recipe_preparation/create">New</a>

        </div>
        <div class="card-body">

            @if(Session::has('success'))
                <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('success') }}</p>
            @endif

            @if(Session::has('failed'))
                <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('failed') }}</p>
            @endif
            <table class="table table-borderd">
                <thead>
                <tr>

                    <th>#</th>
                    <th>Preparation Details</th>
                  
                    <th>Recipe Name</th>
                    <th>Edit </th>
                    <th>delete</th>
           


                </tr>
                </thead>
                @php($i=1)
                @foreach($result as $res)
                    <tr>
                        <td>{{$i++}} </td>
                        <td>{{$res->pre_details}} </td>
                      
                        <td>{{$res->recipe_title}} </td>
                        <td> <a class=" btn btn-info" href="/admin/recipe_preparation/edit/{{$res->pre_id}}">Edit</a> </td>
                        <td> <a class=" btn btn-danger" href="/admin/recipe_preparation/delete/{{$res->pre_id}}"> Delete</a> </td>
                  </tr>

                @endforeach


            </table>
        </div>
    </div>


@endsection
