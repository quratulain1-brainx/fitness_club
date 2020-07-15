@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Edit Member {{ $user->name }}</div>

                    <div class="card-body">
                        <form action="{{ route('user-members.update', $user) }}" method="POST">
                            @csrf
                            {{ method_field('PUT') }}
                            @foreach($roles as $role)
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="roles[]" value="{{ $role->id }}"
                                           @if($user->roles->pluck('id')->contains($role->id)) checked @endif>
                                    <label class="form-check-label" >{{ $role->name }}</label>
                                </div>
                            @endforeach
                            <button type="submit" class="btn btn-warning">
                                Update
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
