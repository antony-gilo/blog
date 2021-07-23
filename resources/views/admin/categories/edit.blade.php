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
<h4 class="mt-lg-5">Edit Post</h4>
<div class="row">
    <div class="col-sm-8">
        {!! Form::model($category, ['method' => 'PATCH', 'action' => ['App\Http\Controllers\AdminCategoryController@update', $category->id]]) !!}

    <div class="row justify-content-center">
        <div class="me-2">
            {!! Form::token() !!}
            {!! Form::label('category', 'Post Category:', ['class' => 'input-label']) !!}
            {!! Form::text('category', $category->category, ['class' => ['form-control', 'mb-1']]) !!}
        </div>
    <div style="display: flex;">
        <div class="me-2" style="flex: 1">
            {!! Form::submit('Update Category', ['class' => ['btn', 'btn-xs', 'btn-primary', 'my-3', 'text-white']]) !!}
        </div>
        {!! Form::close() !!}

    {!! Form::open(['method' => 'DELETE', 'action' => ['App\Http\Controllers\AdminCategoryController@destroy', $category->id]]) !!}
    @csrf
        <div class="me-2" style="flex: 1">
            {!! Form::submit('Delete Post', ['class' => ['btn', 'btn-xs', 'btn-danger', 'my-3', 'text-white']]) !!}
        </div>
    </div>
    {!! Form::close() !!}
    </div>

</div>
</div>

@endsection
