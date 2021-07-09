@extends('layouts.dashboard')

@section('content')
<div class="container">
    @if (Session::has('post.delete'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ Session('post.delete') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if (Session::has('post.update'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ Session('post.update') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if (Session::has('post.create'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ Session('post.create') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
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
