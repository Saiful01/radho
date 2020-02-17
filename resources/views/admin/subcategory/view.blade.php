@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="car-header custom-header">
        <h1> Sub Category Table </h1>
            <a class="btn btn-success float-right" href="/admin/subcategory/create">New</a>

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
                    <th>Sub Category Name</th>
                    <th>Edit </th>
                    <th>delete</th>
           


                </tr>
                </thead>
                @php($i=1)
                @foreach($result as $res)
                    <tr>
                        <td>{{$i++}} </td>
                        <td>{{$res->sub_cat_name}} </td>
                        <td> <a class=" btn btn-info" href="/admin/subcategory/edit/{{$res->sub_cat_id}}">Edit</a> </td>
                        <td> <a class=" btn btn-danger" href="/admin/subcategory/delete/{{$res->sub_cat_id}}"> Delete</a> </td>
                  </tr>

                @endforeach


            </table>
        </div>
    </div>


@endsection
