@extends('layouts.main')
@section('content')
<div class="container">
    <h1 class="text-center">Edit product</h1>
    
    <form action = '{{url('products/'.$product->id)}}' method="POST">
        {{csrf_field()}}
        <input type="hidden" name="_method" value="PATCH">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" value="{{$product->name}}">
        </div>
        <div class="form-group">	
            <label for="price">Price</label>
            <input type="text" name="price" class="form-control" value="{{$product->price}}">
        </div>
        <div class="form-group">
            <label for = "category">Category</label>
            <select name = "category">
                @foreach($categories as $category)
                <option value='{{ $category->id }}' @if($category->id == $product->category) selected='selected' @endif>{{$category->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for = "tag">Tag</label>
            <select name = "tag[]" multiple>

            @foreach($tags as $tag)
                <option value='{{ $tag->id }}'
                 @if(in_array($tag->id, $product->tags->pluck('id')->toArray())) selected='selected' @endif>{{$tag->name}}</option>
            @endforeach
            </select>

        </div>
        <div>
            <input type="submit" name="submit" class="btn btn-primary" value="Save">
        </div>
    </form>
</div>
@endsection