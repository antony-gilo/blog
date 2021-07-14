@extends('layouts.dashboard')

@section('content')
<div class="container">
    <h4>Media</h4>
  <table class="table table-success rounded-pill table-hover mt-3">
    <thead>
      <tr>
        <th scope="col">Id</th>
        <th scope="col">File</th>
        <th scope="col" colspan="2">Date Created</th>
      </tr>
    </thead>
    <tbody>
    @foreach ($photos as $photo)
      <tr>
        <th scope="row"><a href="{{ route('media.edit', $photo->id) }}" style="text-decoration: none;">{{$photo->id}}</a></th>
        <td class="justify-content-align-center">
            <img height="50" width="50" style="border-radius: 10%;" class="px-auto" src="{{ $photo->path ? $photo->path : '/images/default.jpg' }}" alt="image">
        </td>
        <td class="justify-content-align-center">
            {{$photo->created_at->diffForHumans()}}
        </td>
        <td>
            {!! Form::open(['method' => 'DELETE', 'action' => ['App\Http\Controllers\AdminMediaController@destroy', $photo->id]]) !!}
                    {!! Form::submit('Delete Media', ['class' => ['btn', 'btn-xs', 'btn-danger', 'text-white']]) !!}
            {!! Form::close() !!}
        </td>
      </tr>
    @endforeach
    </tbody>
  </table>
</div>

@endsection
