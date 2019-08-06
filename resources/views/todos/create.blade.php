@extends('layouts.app')
@section('title')
Create todos
@endsection


@section('content')

<h1 class="text-center my-5">Create A Todo</h1>
<div class="row justify-content-center">
    <div class="col-md-8">
    <div class="card card-default">
        <div class="card-header">Create a new Todo</div>
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
        <form action ="./store-todo" method="POST">
        @csrf
<div class="form-group">
    <input type="text" class="form-control" name="name" placeholder="name">
</div>
<div class="form-group">
    <textarea name="description"  rows="5" class="form-control" placeholder="Description"></textarea>
</div>
<div class="form-group text-center">
<button type="submit" class="btn btn-success" >Create Todo</button>

</div>
</form>
        </div>
    </div>
    </div>
</div>

@endsection