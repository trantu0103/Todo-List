@extends('layouts.app')
@section('content')
<h1 class="text-center my-5">Edit Todos</h1>  
<div class="row justify-content-center">
  <div class="col-md-8">
    <div class="card card-default">
      <div class="card-header">
        Edit todo  
      </div>
      <div class="card-body">
        @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
        @endif
          <form action="/todos-app/public/todos/{{ $todo->id }}/update-todos" method="post">
            @csrf
              <div class="form-group">
              <input type="text" class="form-control" name="name" value="{{ $todo->name }}" placeholder="Name">
              </div>  
              <div class="form-group">
                <textarea class="form-control" name="description" cols="5" rows="5" placeholder="Description">{{ $todo->description }}
                </textarea>
              </div>
              <div class="form-group text-center">
                <button type="submit" class="btn btn-primary">Edit Todo</button>
              </div>
            </form> 
      </div>
    </div> 
  </div>
</div>
@endsection