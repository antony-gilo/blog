@extends('layouts.dashboard')

@section('content')
<div class="container">
<h4>Categories</h4>
  <table class="table table-success rounded-pill table-hover mt-3">
    <thead>
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Category</th>
        <th scope="col">Date Created</th>
      </tr>
    </thead>
    <tbody>
    @foreach ($categories as $category)
      <tr>
        <th scope="row"><a href="{{ route('categories.edit', $category->id) }}" style="text-decoration: none;">{{$category->id}}</a></th>
        <td>{{$category->category}}</td>
        <td>{{$category->created_at->diffForHumans()}}</td>
      </tr>
    @endforeach
    </tbody>
  </table>
</div>

@endsection
