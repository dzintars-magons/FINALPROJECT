@extends('layouts.app')

@section('content')

<div class="container">
    <form method="POST" action="{{ url('update-todo') }}/{{ $todo->id }}">
        {{ csrf_field() }}
        <div class='form-group col-md-3'>
            <label>Todo name</label>
            <input type='text' name='todo' class='form-control' value='{{ $todo->title }}'>
        </div>
        <div class='form-group col-md-12'>
            <input type='submit' value="update" class='btn btn-success'>
        </div>
    </form>
</div>

@endsection