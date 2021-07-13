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
    <h4>Posts:</h4>
  <table class="table table-success rounded-pill table-hover mt-3">
    <thead>
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Post Photo</th>
        <th scope="col">Category</th>
        <th scope="col">Post Title</th>
        <th scope="col">Content</th>
        <th scope="col">Post Owner</th>
        <th scope="col">Time Posted</th>
      </tr>
    </thead>
    <tbody>
    @foreach ($posts as $post)
      <tr>
        <th scope="row"><a href="{{ route('posts.edit', $post->id) }}" style="text-decoration: none;">{{$post->id}}</a></th>
        <td class="justify-content-align-center">
            <img height="30" width="40" style="border-radius: 10%;" class="px-auto" src="{{ $post->photo ? $post->photo->path : '/images/default.jpg' }}" alt="">
        </td>
        <td>{{$post->category->category}}</td>
        <td>{{$post->title}}</td>
        <td>{{Str::limit($post->body, 80)}}</td>
        <td>{{$post->user->name}}</td>
        <td>{{$post->created_at->diffForHumans()}}</td>
      </tr>
    @endforeach
    </tbody>
  </table>
</div>

@endsection
