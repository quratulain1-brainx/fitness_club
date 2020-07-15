@extends('layouts.app')

@section('content')
    <style>
        .delete{
            float: right;
        }
    </style>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">User
                        <a href="{{url('/admin/user-members')}}" class="btn btn-primary btn-sm"
                        role="button">View Members</a>
                        <a href="{{url('/admin/user-trainer')}}" class="btn btn-warning btn-sm"
                           role="button">View Trainer</a>
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
                              @foreach($users as $user)
                                  <tr>
                                      <td scope="row">{{$user->id}}</td>
                                      <td>{{$user->name}}</td>
                                      <td>{{$user->email}}</td>
                                      <td>{{ implode('--',$user->roles()->get()->pluck('name')->toArray())}}</td>
                                      <td>
                                          @can('editUsers')
                                          <a href="{{ route('users.edit', $user->id) }}">
                                          <button type="button" class="btn btn-primary">Edit</button></a>
                                          @endcan
                                          <div class="delete">
                                          <form  action="{{ route('users.destroy', $user) }}" method="GET" >
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
