@extends('layouts.main')
@section('content')
<div>
	<div>ID: {{$category->id}}</div>
	<div>Name: {{$category->name}}</div>
	<div>Price: {{$category->price}}</div>
	<div>Category: {{$category->category}}</div>
</div>
@endsection