@extends('layouts.main')
@section('content')
<div class="container">
    <h1 class="text-center">Edit category</h1>
    <form action = '{{url('categories/'.$category->id)}}' method="POST">
        {{csrf_field()}}
        <input type="hidden" name="_method" value="PATCH">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" value="{{$category->name}}">
            {{$errors->first('name')}}
        </div>
        <div>
            <input type="submit" name="submit" class="btn btn-primary" value="Save">
        </div>
    </form>
</div>
@endsection