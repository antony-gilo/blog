@extends('layouts.dashboard')

@section('content')

<div class="container">
<h4>Post Comments</h4>
  <table class="table table-success rounded-pill table-hover mt-3">
    <thead>
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Comment</th>
        <th scope="col">Comment Author</th>
        <th scope="col">Comment Author Photo</th>
        <th scope="col">Date Created</th>
      </tr>
    </thead>
    <tbody>
    @foreach ( $comments as $comment)
      <tr>
        <th scope="row"><a href="{{ route('comments.edit', $comment->id) }}" style="text-decoration: none;">{{$comment->id}}</a></th>
        <td>{{$comment->body}}</td>
        <td>{{$comment->author}}</td>
        <td class="justify-content-align-center">
            <img height="30" width="40" style="border-radius: 10%;" class="px-auto" src="{{ $comment->author_photo ? $comment->author_photo : '/images/default.jpg' }}" alt="">
        </td>
        <td>{{$comment->created_at->diffForHumans()}}</td>
      </tr>
    @endforeach
    </tbody>
  </table>
</div>

@endsection
