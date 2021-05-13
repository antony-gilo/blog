@extends('layouts.dashboard')

@section('content')
<div class="container">
  <table class="table table-success rounded-pill table-hover mt-3">
    <thead>
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Display Photo</th>
        <th scope="col">Names</th>
        <th scope="col">Role</th>
        <th scope="col">Email Address</th>
        <th scope="col">Status</th>
        <th scope="col">Date Created</th>
      </tr>
    </thead>
    <tbody>
    @foreach ($users as $user)
      <tr>
        <th scope="row">{{$user->id}}</th>
        <td class="justify-content-align-center">
            <img height="40" width="40" style="border-radius: 50%;" class="px-auto" src="{{ $user->photo ? $user->photo->path : '/images/default.jpg' }}" alt="">
        </td>
        <td><a href="{{ route('users.edit', $user->id) }}">{{$user->name}}</a></td>
        <td>{{$user->role->role_name}}</td>
        <td>{{$user->email}}</td>
        <td>{{$user->is_active === 1 ? 'Active' : 'Inactive'}}</td>
        <td>{{$user->created_at->diffForHumans()}}</td>
      </tr>
    @endforeach
    </tbody>
  </table>
</div>

@endsection
