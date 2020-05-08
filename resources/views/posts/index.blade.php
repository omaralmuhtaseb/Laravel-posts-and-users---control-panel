@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-8">

                <div class="card">
                    <div class="card-header">Posts</div>

                    <div class="card-body">
                        @if($posts->count()>0)
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Image</th>
                                <th scope="col">Created </th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($posts as $post)
                                <tr>
                                    <td>{{$post->id}}</td>
                                    <td>{{$post->title}}</td>
                                    <td><img height="100px" width="100px" src=" {{$post->image}}" alt="{{$post->title}}" class="img-thumbnail "> </td>
                                   <!-- <td>{{substr($post->created_at,0,10)}}</td> -->
                                    <td>{{$post->created_at->diffForHumans()}}</td>
                                    <td><a href="{{route('post.edit',['id'=>$post->id])}}">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                    </td>

                                    <td><a href="{{route('post.delete',['id'=>$post->id])}}">
                                            <i style="color: red" class="fa fa-trash"></i>
                                        </a>
                                    </td>

                                </tr>

                            @endforeach

                            </tbody>
                        </table>
                            @else

                            <p class="text-capitalize mb-5 text-muted text-lg-center">No posts to show !</p>

                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
