@extends('layouts.main')
@section('content')
<div class="container">
    <h1 class="text-center">Create product</h1>
 
    <form action = '{{url('products')}}' method="POST">
        {{csrf_field()}}
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" value="{{old('name')}}">
            {{$errors->first('name')}}
        </div>
        <div class="form-group">	
        <label for="price">Price</label>
        <input type="text" name="price" class="form-control" value="{{old('price')}}">
        {{$errors->first('price')}}
        </div>
        <div class="form-group">
            <label for = "category">Category</label>
            <select name = "category">

            @foreach($categories as $category)
                <option value='{{ $category->id }}'>{{$category->name}}</option>
            @endforeach
            </select>

        </div>
        <div class="form-group">
            <label for = "tag">Tag</label>
            <select name = "tag[]" multiple>

            @foreach($tags as $tag)
                <option value='{{ $tag->id }}'>{{$tag->name}}</option>
            @endforeach
            </select>

        </div>
        <div>
        <input type="submit" name="submit" class="btn btn-primary" value="Save">
        </div>
    </form>
</div>
@endsection