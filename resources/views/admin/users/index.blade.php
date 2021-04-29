@extends('layouts.dashboard')

@section('content')
<div class="container">
  <table class="table table-success rounded-pill table-hover mt-3">
    <thead>
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Names</th>
        <th scope="col">Email Address</th>
        <th scope="col">Date Created</th>
      </tr>
    </thead>
    <tbody>
    @foreach ($users as $user)
      <tr>
        <th scope="row">{{$user->id}}</th>
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
        <td>{{$user->created_at->diffForHumans()}}</td>
      </tr>
    @endforeach
    </tbody>
  </table>
</div>

@endsection
