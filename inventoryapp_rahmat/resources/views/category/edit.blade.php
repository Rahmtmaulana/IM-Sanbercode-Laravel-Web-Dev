@extends('layouts.master')

@section('content')
<form action="/category/{{$category->id}}" method="POST">
  @csrf
  @method('PUT')

  <input type="text" name="name" value="{{$category->name}}" class="form-control">
  <textarea name="description" class="form-control">{{$category->description}}</textarea>

  <button class="btn btn-primary">Update</button>
</form>
@endsection