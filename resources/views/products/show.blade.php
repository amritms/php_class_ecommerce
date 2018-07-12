@extends('layouts.main')
@section('content')
<div>
	<div>ID: {{$product->id}}</div>
	<div>Name: {{$product->name}}</div>
	<div>Price: {{$product->price}}</div>
	<div>Category: {{$product->category}}</div>
</div>
@endsection