@extends('layout')

@section('form')
<form style="width: 550px;margin:100px auto;" method="POST" action="{{ route('tasks.store')}}">
  @csrf
  <div class="form-group">
    <label>Title</label>
    <input type="text" class="form-control" name="title" placeholder="Title" value="{{old('title')}}">
    @error('title')
    <div style="color:red;">
      {{ $message }}
    </div>
    @enderror
  </div>
  <div class="form-group">
    <label>Description</label>
    <textarea name="description" placeholder="Description" class="form-control">{{old('description')}}</textarea>
    @error('description')
    <div style="color:red;">
      {{ $message }}
    </div>
    @enderror
  </div>
  <div class="form-group">
    <label>Long-Description</label>
    <textarea name="longDescription" placeholder="Long-Description" class="form-control" rows="5">{{old('longDescription')}}</textarea>
    @error('description')
    <div style="color:red;">
      {{ $message }}
    </div>
    @enderror
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@stop