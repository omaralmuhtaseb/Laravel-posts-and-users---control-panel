@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-8">

                <div class="card">
                    <div class="card-header">Posts</div>

                    <div class="card-body">
                        @if($tags->count()>0)
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Created at</th>
                                    <th scope="col">Edit </th>
                                    <th scope="col">Delete</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($tags as $tag)
                                    <tr>
                                        <td>{{$tag->id}}</td>
                                        <td>{{$tag->tag}}</td>
                                        <td>{{substr($tag->created_at,0,10)}}</td>
                                        <td><a href="{{route('tag.edit',['id'=>$tag->id])}}">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                        </td>

                                        <td><a href="{{route('tag.delete',['id'=>$tag->id])}}">
                                                <i style="color: red" class="fa fa-trash"></i>
                                            </a>
                                        </td>

                                    </tr>

                                @endforeach

                                </tbody>
                            </table>
                        @else

                            <p class="text-capitalize mb-5 text-muted text-lg-center">No tags to show !</p>

                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
