@extends('layouts.app')
@section('title')
Edit a Todo
@endsection


@section('content')

<h1 class="text-center my-5">Edit A Todo</h1>
<div class="row justify-content-center">
    <div class="col-md-8">
    <div class="card card-default">
        <div class="card-header">Details of Todo</div>
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
        <form action ="/laravel/public/update-todo" method="POST">
        @csrf
<div class="form-group">
    <input type="hidden" name="todo_id" value="{{$todo->id}}">
    <input type="text" class="form-control" name="name" placeholder="name" value="{{$todo->name}}">
</div>
<div class="form-group">
    <textarea name="description"  rows="5" class="form-control" placeholder="Description">{{$todo->description}}
    </textarea>
</div>
<div class="form-group text-center">
<button type="submit" class="btn btn-success" >Update Todo</button>

</div>
</form>
        </div>
    </div>
    </div>
</div>

@endsection