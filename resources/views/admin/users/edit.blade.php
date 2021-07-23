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
<h4>Edit User</h4>
<div class="row">
    <div class="col-sm-4">
        <img src="{{ $user->photo ? $user->photo->path : '/images/default.jpg' }}" alt="" class="border rounded mt-2" style="max-width: 90%">
    </div>

    <div class="col-sm-8">
        {!! Form::model($user, ['method' => 'PATCH', 'action' => ['App\Http\Controllers\AdminUserController@update', $user->id], 'files' => true]) !!}
        @csrf
    <div class="row justify-content-center">
        <div class="me-2">
            {!! Form::token() !!}
            {!! Form::label('name', 'Full Names:', ['class' => 'input-label']) !!}
            {!! Form::text('name', null, ['class' => ['form-control', 'mb-1']]) !!}
        </div>
        <div class=" me-2 my-1">
            {!! Form::token() !!}
            {!! Form::label('email', 'Email:', ['class' => 'input-label']) !!}
            {!! Form::email('email', null, ['class' => ['form-control', 'mb-1']]) !!}
        </div>
        <div class="me-2 my-1">
            {!! Form::token() !!}
            {!! Form::label('role_id', 'User Role:', ['class' => 'input-label']) !!}
            {!! Form::select('role_id', $roles_array, null, ['class' => ['form-select', 'mb-1', 'placeholder' => 'Select Role']]) !!}
        </div>
        <div class="me-2 my-1">
            {!! Form::token() !!}
            {!! Form::label('is_active', 'User Status:', ['class' => 'input-label']) !!}
            {!! Form::select('is_active', [1 => 'Active', 0 => 'Inactive'], null, ['class' => ['form-select', 'placeholder' => 'Select Status']]) !!}
        </div>
        <div class="me-2 my-1">
            {!! Form::token() !!}
            {!! Form::label('photo_id', 'Select Photo:', ['class' => 'input-label']) !!}
            {!! Form::file('photo_id', ['class' => 'form-control']) !!}
        </div>
        <div class="me-2 my-1">
            {!! Form::token() !!}
            {!! Form::label('password', 'Password:', ['class' => 'input-label']) !!}
            {!! Form::password('password', ['class' => ['form-control', 'mb-1']]) !!}
        </div>
        <div class="me-2">
            {!! Form::submit('Update User', ['class' => ['btn', 'btn-xs', 'btn-primary', 'my-3', 'text-white']]) !!}
        </div>
    </div>
    {!! Form::close() !!}

    {!! Form::open(['method' => 'DELETE', 'action' => ['App\Http\Controllers\AdminUserController@destroy', $user->id]]) !!}
    @csrf
        <div class="me-2">
            {!! Form::submit('Delete User', ['class' => ['btn', 'btn-xs', 'btn-danger', 'my-2', 'text-white']]) !!}
        </div>
    {!! Form::close() !!}
    </div>

</div>
</div>

@endsection
