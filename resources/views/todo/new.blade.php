@extends('layouts.app')

@section('content')

<div class="container">
    <form method="POST" action="{{ url('save-todo') }}">
        {{ csrf_field() }}
        <div class='form-group col-md-3'>
            <label>Todo name</label>
            <input type='text' name='todo' class='form-control'>
        </div>
        <div class='form-group col-md-12'>
            <input type='submit' value="Save" class='btn btn-success'>
        </div>
    </form>
</div>

@endsection