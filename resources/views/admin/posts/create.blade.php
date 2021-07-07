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

  {!! Form::open(['method' => 'POST', 'action' => 'App\Http\Controllers\AdminPostsController@store', 'files' => true]) !!}
  <div class="row justify-content-center">
    {!! Form::token() !!}
    <div class="me-2">
    <h4>Create New Post</h4>
        {!! Form::label('title', 'Post Title:', ['class' => 'input-label']) !!}
        {!! Form::text('title', null, ['class' => ['form-control', 'mb-1']]) !!}
    </div>
    <div class="me-2 my-1">
        {!! Form::label('category_id', 'Post Category:', ['class' => 'input-label']) !!}
        {!! Form::select('category_id', $posts_array, 2, ['class' => ['form-select', 'mb-1', 'placeholder' => 'Select Post Category']]) !!}
    </div>
    <div class="me-2">
        {!! Form::token() !!}
        {!! Form::label('body', 'Post Content:', ['class' => 'input-label']) !!}
        {!! Form::textarea('body', null, ['class' => ['form-control', 'mb-1']]) !!}
    </div>
    <div class="me-2 my-1">
        {!! Form::label('photo_id', 'Select Photo:', ['class' => 'input-label']) !!}
        {!! Form::file('photo_id', ['class' => 'form-control']) !!}
    </div>
    <div class="me-2">
        {!! Form::submit('Create Post', ['class' => ['btn', 'btn-xs', 'btn-primary', 'my-3', 'text-white']]) !!}
    </div>
  </div>
  {!! Form::close() !!}

</div>

@endsection
