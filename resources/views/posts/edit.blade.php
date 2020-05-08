@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-8">
                @if(count($errors)>0)
                    <div class="alert alert-danger" role="alert">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>
                                    {{$error}}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">Edit Post &nbsp;{{$post->title}}</div>

                    <div class="card-body">
                        <form action="{{route('post.update',['id'=>$post->id])}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="content">Category</label>
                                <select   class="form-control" name="category_id">
                                    @foreach($categories as $category)
                                        @if($category->id ==$post->category_id)
                                            <option selected value="{{$category->id}}">{{$category->name}}</option>


                                        @else
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-check">
                                @foreach($tags as $tag)

                                    <label class="form-check-label">
                                    <input type="checkbox" name="tags[]" value="{{$tag->id}}"

                                @foreach($post->tags as $ta)
                                        @if($tag->id == $ta->id)
                                            checked
                                            @endif
                                        @endforeach
                                           class="form-check-input">{{$tag->tag}}</label><br>
                                @endforeach
                            </div>
                            <div class="form-group">
                                <label for="Title">Title</label>
                                <input type="text" class="form-control" value="{{$post->title}}" name="title">
                            </div>
                            <div class="form-group">
                                <label for="content">Content</label>
                                <textarea rows="8" cols="8" type="text" class="form-control"  name="contents">{{$post->content}}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="image">Featured Image</label>
                                <input type="file" name="image">
                            </div>

                            <button type="submit" class="form-group btn col-md-6 btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
