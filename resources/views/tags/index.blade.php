@extends('layouts.main')
@section('content')
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<a href="{{url('/tags/create')}}" class="btn btn-primary">Add Tag</a>
	<table class="table table-striped">
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Actions</th>
		</tr>
	
@foreach($tags as $tag)
<tr>
	<td>{{$tag->id}}</td>
	<td>{{$tag->name}}</td>
	<td>
		<a href="{{url('tags/'.$tag->id.'/edit')}}"><i class="material-icons" style="color: #000000;font-size:20px;">edit</i></a>
		 |
		<form action="{{route('tags.destroy', $tag->id)}}" method="POST" style="display:inline-block" class="delete">
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