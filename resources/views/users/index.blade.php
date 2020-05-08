@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-8">

                <div class="card">
                    <div class="card-header">Users</div>

                    <div class="card-body">
                        @if($users->count()>0)
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Role</th>
                                <th scope="col">Image</th>
                                <th scope="col">Created </th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>
                                        @if($user->admin)
                                            Admin </td>
                                    <td>
                                        <a href="{{route('users.un-admin',['id'=>$user->id])}}">
                                            Un-admin <i class="fa fa-edit"></i>
                                        </a>
                                    </td>
                                            @else
                                            Not admin </td>
                                    <td>
                                        <a href="{{route('users.make-admin',['id'=>$user->id])}}">
                                                Make admin <i class="fa fa-edit"></i>
                                            </a>
                                    </td>
                                        @endif


                                   {{--<td><img height="100px" width="100px" src="{{asset($user->profile->image)}}"  class="img-thumbnail "> </td>--}}
                                   {{--<td>{{substr($post->created_at,0,10)}}</td> --}}
                                    <td>{{$user->created_at->diffForHumans()}}</td>



                                    {{--<td>users.un-admin<a href="{{route('user.delete',['id'=>$user->id])}}">--}}
                                            {{--<i style="color: red" class="fa fa-trash"></i>--}}
                                        {{--</a>--}}
                                    {{--</td>--}}

                                </tr>

                            @endforeach

                            </tbody>
                        </table>
                            @else

                            <p class="text-capitalize mb-5 text-muted text-lg-center">No Users !</p>

                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
