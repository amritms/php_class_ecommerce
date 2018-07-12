@extends('layouts.main')
@section('content')
<div class="container">
    <h1 class="text-center">Edit Tag</h1>
    <form action = '{{url('tags/'.$tag->id)}}' method="POST">

    {!! Form::model($tag, ['route' => ['tags.edit' , $tag->id], 'method' => 'PATCH']) !!}
        
        <div class="form-group">
            <label for="name">Name</label>
            <!-- <input type="text" name="name" class="form-control" value="{{$tag->name}}"> -->
            {!! Form::text('name', null, ['class' => 'form-control'])!!}
            {{$errors->first('name')}}
        </div>
        <div>
            <input type="submit" name="submit" class="btn btn-primary" value="Save">
        </div>
    {!! Form::close() !!}
</div>
@endsection