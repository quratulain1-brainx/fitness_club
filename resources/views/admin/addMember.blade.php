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
                                <th scope="col">Actions</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($userRole as $users)
                                <tr>
                                    <td scope="row">{{$users->id}}</td>
                                    <td>{{$users->name}}</td>
                                    <td>{{$users->email}}</td>
                                    <td>
                                                <button type="button" class="btn btn-primary">Edit</button>
                                        <div class="delete">
                                            <form   method="GET" >
                                                @csrf
                                                {{ method_field('DELETE') }}
                                                <button type="button" class="btn btn-danger" >Delete</button>
                                            </form>
                                        </div>
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
