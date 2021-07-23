@extends('layouts.dashboard')

@section('content')

<div class="container">
@if (count($errors) > 0)
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
            <li>
                {{$error}}
            </li>
            @endforeach
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
<h4>Edit Post</h4>
<div class="row">
    <div class="col-sm-4">
        <img src="{{ $post->photo ? $post->photo->path : '/images/placeholder.jpg' }}" alt="" class="border rounded mt-2" style="max-width: 90%">
    </div>

    <div class="col-sm-8">
        {!! Form::model($post, ['method' => 'PATCH', 'action' => ['App\Http\Controllers\AdminPostsController@update', $post->id], 'files' => true]) !!}
        @csrf
    <div class="row justify-content-center">
        <div class="me-2">
            {!! Form::token() !!}
            {!! Form::label('title', 'Post Title:', ['class' => 'input-label']) !!}
            {!! Form::text('title', $post->title, ['class' => ['form-control', 'mb-1']]) !!}
        </div>
        <div class="me-2 my-1">
            {!! Form::token() !!}
            {!! Form::label('body', 'Post Content:', ['class' => 'input-label']) !!}
            {!! Form::textarea('body', $post->body, ['class' => ['form-control', 'mb-1']]) !!}
        </div>
        <div class="me-2 my-1">
            {!! Form::token() !!}
            {!! Form::label('category_id', 'Post Category:', ['class' => 'input-label']) !!}
            {!! Form::select('category_id', $posts_array, $post->category_id, ['class' => ['form-select', 'mb-1']]) !!}
        </div>
        <div class="me-2 my-1">
            {!! Form::token() !!}
            {!! Form::label('photo_id', 'Select Photo:', ['class' => 'input-label']) !!}
            {!! Form::file('photo_id', ['class' => 'form-control']) !!}
        </div>
        <div class="me-2">
            {!! Form::submit('Update Post', ['class' => ['btn', 'btn-xs', 'btn-primary', 'my-3', 'text-white']]) !!}
        </div>
    </div>
    {!! Form::close() !!}

    {!! Form::open(['method' => 'DELETE', 'action' => ['App\Http\Controllers\AdminPostsController@destroy', $post->id]]) !!}
    @csrf
        <div class="me-2">
            {!! Form::submit('Delete Post', ['class' => ['btn', 'btn-xs', 'btn-danger', 'my-2', 'text-white']]) !!}
        </div>
    {!! Form::close() !!}
    </div>

</div>
</div>

@endsection
