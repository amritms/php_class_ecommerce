@extends('layouts.main')
@section('content')
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<a href="{{url('/categories/create')}}" class="btn btn-primary">Add Category</a>
	<table class="table table-striped">
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Actions</th>
		</tr>
	
@foreach($categories as $category)
<tr>
	<td>{{$category->id}}</td>
	<td>{{$category->name}}</td>
	<td>
		<a href="{{url('categories/'.$category->id.'/edit')}}"><i class="material-icons" style="color: #000000;font-size:20px;">edit</i></a>
		 |
		<form action="{{route('categories.destroy', $category->id)}}" method="POST" style="display:inline-block" class="delete">
			{{csrf_field()}}
			<input type="hidden" name="_method" value="delete">
			<button type="submit" value="delete" class="material-icons" style="color: #000000;font-size:20px;cursor:pointer; background-color: transparent;
    border:transparent;">delete
		</form>
	</td>
</tr>
	
@endforeach
</table>

<script>
		$(".delete").on("submit", function(){
			return confirm("Are you sure?");
		});
	</script>
@endsection