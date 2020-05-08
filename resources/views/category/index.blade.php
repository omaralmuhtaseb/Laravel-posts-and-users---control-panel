@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-8">

                <div class="card">
                    <div class="card-header">Categories</div>

                    <div class="card-body">

                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $category)
                            <tr>
                                <td>{{$category->id}}</td>
                                <td>{{$category->name}}</td>
                                <td><a href="{{route('category.edit',['id'=>$category->id])}}">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                </td>

                                <td><a href="{{route('category.delete',['id'=>$category->id])}}">
                                        <i style="color: red" class="fa fa-trash"></i>
                                    </a>
                                </td>

                            </tr>

                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
