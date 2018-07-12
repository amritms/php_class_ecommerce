@extends('layouts.main')
@section('content')


<div class="container">
<h1 class="text-center">Create Tag</h1>

{!! Form::open(['url' => 'tags', 'method' => 'POST']) !!}

<div class="form-group">
<label for="name">Name</label>

{!! Form::text('name', null, ['class' => 'form-control']) !!}
{{$errors->first('name')}}
</div><br>


</div><br>
<div>
<input type="submit" name="submit" class="btn btn-primary" value="Save">
</div>
{!! Form::close() !!}
</div>

@endsection