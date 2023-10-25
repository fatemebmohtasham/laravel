@extends('layout')

@section('tasks')

<div class="col-12">
  <a href="{{route('tasks.create')}}" class="btn btn-warning">Get tasks</a>
</div>
<table class="table mb-4">
  <thead>
    @foreach($tasks as $task)
    <tr>
      <th scope="col">No.</th>
      <th scope="col">Title</th>
      <th scope="col">Description</th>
      <th scope="col">Status</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>{{$task->id}}</td>
      <td>{{$task->title}}</td>
      <td>{{$task->description}}</td>
      <td>{{$task->status}}</td>
      <td>
        <div style="display:flex; align-items: stretch;">
          <form method="POST" action="{{route('tasks.destroy', $task)}}" style="margin-right: 10px;">
            @method('DELETE')
            @csrf
            <button type="submit" class="btn btn-danger ms-1">Delete</button>
          </form>
          <form method="POST" action="{{ route('complete', $task) }}" style="margin-right: 10px;">
            @method('PUT')
            @csrf
            <button type="submit" class="btn btn-success ms-1">Complete</button>
          </form>
          <a href="{{ route('tasks.edit',$task) }}" class="btn btn-info ms-1">Edit</a>
        </div>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
<div class="d-flex">
  {!! $tasks->links() !!}
</div>
@stop