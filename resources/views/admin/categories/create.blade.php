@extends('layouts.dashboard')

@section('content')

<div class="row">
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
    <div class="col" style="display: flex;">
        <div class="m-5" style="flex: 1;">
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
        <div class="my-5 ms-5 col" style="flex: 1;">
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
    </div>
</div>

@endsection
