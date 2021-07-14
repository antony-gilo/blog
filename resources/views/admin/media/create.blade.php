@extends('layouts.dashboard')

@section('styles')

       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/min/dropzone.min.css" integrity="sha512-WvVX1YO12zmsvTpUQV8s7ZU98DnkaAokcciMZJfnNWyNzm7//QRV61t4aEr0WdIa4pe854QHLTV302vH92FSMw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

@endsection

@section('content')

<div class="" style="display: flex; align-content: center; align-content: center; margin-top: 10%;">
    <div class="row justify-content-center flex-fill">
        <h4 class="text-center mb-4">Create New Media</h4>
        {!! Form::open(['method' => 'POST', 'action' => 'App\Http\Controllers\AdminMediaController@store', 'class'=>'dropzone']) !!}
        {!! Form::close() !!}
    </div>
</div>

@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/dropzone.min.js" integrity="sha512-llCHNP2CQS+o3EUK2QFehPlOngm8Oa7vkvdUpEFN71dVOf3yAj9yMoPdS5aYRTy8AEdVtqUBIsVThzUSggT0LQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection
