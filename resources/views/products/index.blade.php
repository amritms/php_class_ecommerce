@extends('layouts.main')
@section('content')
<div>
<div>
	<a href="{{url('/products/create')}}" class="btn btn-primary">Add product</a>

	<table class="table table-striped">
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Price</th>
			<th>Category</th>
			<th>Actions</th>
		</tr>

	@foreach($products as $product)
	<tr>
	<td>{{$product->id}}</td>
	<td>{{$product->name}}</td>
	<td>{{$product->price}}</td>
	<td>{{ optional($product->categories)->name}}</td>
	<td>
		<a href="{{url('products/'.$product->id.'/edit')}}">Edit</a>
			| 
			
			<form action="{{route('products.destroy', $product->id)}}" method="POST" class="delete">
			{{csrf_field()}}
			<input type="hidden" name="_method" value="delete">
			<input type="submit" value="delete" />
		</form>
	</td>
	</tr>

	@endforeach
	</table>
	</div>
	<div>
	<h2>categories</h2>
	@include('categories.sidebar_categories')
	</div>
	</div>

	<script>
		$(".delete").on("submit", function(){
			return confirm("Are you sure?");
		});
	</script>
@endsection