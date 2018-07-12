@extends('layouts.main')
@section('content')


<div class="container">
<h1 class="text-center">Create Category</h1>
<form action = '{{url('categories')}}' method="POST">
{{csrf_field()}}
<div class="form-group">
<label for="name">Name</label>
<input type="text" name="name" class="form-control" value="{{old('name')}}">
{{$errors->first('name')}}
</div><br>


</div><br>
<div>
<input type="submit" name="submit" class="btn btn-primary" value="Save">
</div>
</form>
</div>

@endsection