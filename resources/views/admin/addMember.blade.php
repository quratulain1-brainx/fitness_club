@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">User Members
                        <a href="{{url('/admin/user-members/create')}}" class="btn btn-primary btn-sm" role="button">Add Member</a>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Roles</th>
                                <th scope="col">Actions</th>
                            </tr>
                            </thead>
                            <tbody>

{{--                            @foreach($userRole as $user)--}}
{{--                                <tr>--}}
{{--                                    <td scope="row">{{$user->id}}</td>--}}
{{--                                    <td>{{$user->name}}</td>--}}
{{--                                    <td>{{$user->email}}</td>--}}
{{--                                    <td>{{ implode('--',$user->roles()->get()->pluck('name')->toArray())}}</td>--}}
{{--                                    <td>--}}
{{--                                        @can('editUsers')--}}
{{--                                            <a href="{{ route('user-members.edit', $user->id) }}">--}}
{{--                                                <button type="button" class="btn btn-primary">Edit</button></a>--}}
{{--                                        @endcan--}}
{{--                                        <div class="delete">--}}
{{--                                            <form  action="{{ route('user-members.destroy', $user) }}" method="GET" >--}}
{{--                                                @csrf--}}
{{--                                                {{ method_field('DELETE') }}--}}
{{--                                                <a href="{{ route('user-members.destroy', $user->id) }}">--}}
{{--                                                 @can('deleteUsers')--}}
{{--                                                <button type="button" class="btn btn-danger" >Delete</button>--}}
{{--                                                 @endcan--}}
{{--                                                 </a>--}}
{{--                                            </form>--}}
{{--                                        </div>--}}
{{--                                    </td>--}}
{{--                                </tr>--}}

{{--                            @endforeach--}}

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
