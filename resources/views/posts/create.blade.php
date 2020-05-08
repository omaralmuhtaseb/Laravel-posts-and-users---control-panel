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
                    <div class="card-header">Create Post</div>

                    <div class="card-body">
                        <form action="{{route('post.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="content">Category</label>
                                <select   class="form-control" name="category_id">
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>

                                    @endforeach
                                </select>
                            </div>
                            <label for="tags">Tags</label>

                            <div class="form-check">
                                @foreach($tags as $tag)
                                <input type="checkbox" name="tags[]" value="{{$tag->id}}" class="form-check-input">
                                <label class="form-check-label"> {{$tag->tag}}  </label><br>
                                    @endforeach
                            </div>

                            <div class="form-group">
                                <label for="Title">Title</label>
                                <input type="text" class="form-control" name="title">
                            </div>
                            <div class="form-group">
                                <label for="content">Content</label>
                                <textarea rows="8" cols="8" type="text" class="form-control" name="contents"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="image">Featured Image</label>
                                <input type="file" name="image">
                            </div>

                            <button type="submit" class="form-group btn col-md-6 btn-primary">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
