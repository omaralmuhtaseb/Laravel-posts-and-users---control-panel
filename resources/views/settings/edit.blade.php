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
                    <div class="card-header">Edit Settings</div>

                    <div class="card-body">
                        <form action="{{route('settings.update')}}" method="post" >
                            @csrf

                            <div class="form-group">
                                <label for="Title">Website Name</label>
                                <input type="text" class="form-control" name="name" value="{{$setting->site_name}}">
                            </div>
                            <div class="form-group">
                                <label for="content">Email</label>
                                <input type="text" class="form-control" name="email" value="{{$setting->email}}">
                            </div>
                            <div class="form-group">
                                <label for="content">Phone</label>
                                <input type="text" class="form-control" name="phone" value="{{$setting->phone}}">
                            </div>
                            <div class="form-group">
                                <label for="content">Address</label>
                                <input  type="text" class="form-control" name="address" value="{{$setting->address}}">
                            </div>

                            <button type="submit" class="form-group btn col-md-6 btn-primary">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
