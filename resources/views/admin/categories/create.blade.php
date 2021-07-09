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

  {!! Form::open(['method' => 'POST', 'action' => 'App\Http\Controllers\AdminCategoryController@store']) !!}
  <div class="row justify-content-center">
    {!! Form::token() !!}
    <div class="me-2">
    <h4>Create New Post Category</h4>
        {!! Form::label('category', 'Category Name:', ['class' => 'input-label']) !!}
        {!! Form::text('category', null, ['class' => ['form-control', 'mb-1']]) !!}
    </div>
    <div class="me-2">
        {!! Form::submit('Create Category', ['class' => ['btn', 'btn-xs', 'btn-primary', 'my-3', 'text-white']]) !!}
    </div>
  </div>
  {!! Form::close() !!}

</div>

@endsection
