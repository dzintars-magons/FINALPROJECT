@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{ url('add-todo') }}" class="btn btn-primary btn-sm">Add task</a>
    <h2>Todo tasks</h2>
    <table class="table tbal-striped">
        <thead>
            <tr>
                <th>Task</th>
                <th>Created_at</th>
                <th>Updated_at</th>
                <th>Modify</th>
            </tr>
        </thead>
        <tbody>
            @foreach($todos as $t)
                <tr>
                    <td>{{ $t->title }}</td>
                    <td>{{ $t->created_at }}</td>
                    <td>{{ $t->updated_at }}</td>
                    <td>
                        <a href="{{ url('edit-todo') }}/{{ $t->id }}" class="btn btn-warning">Edit</<a>
                        <a href="{{ url('switch-status') }}/{{ $t->id }}" class="btn btn-success">Done</<a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <hr>
    @if( count($done_todos) > 0)
        <h2>Done tasks</h2>
        <table class="table tbal-striped">
            <thead>
                <tr>
                    <th>Task</th>
                    <th>Created_at</th>
                    <th>Updated_at</th>
                    <th>Modify</th>
                </tr>
            </thead>
            <tbody>
                @foreach($done_todos as $t)
                    <tr>
                        <td>{{ $t->title }}</td>
                        <td>{{ $t->created_at }}</td>
                        <td>{{ $t->updated_at }}</td>
                        <td>
                            <a href="{{ url('switch-status') }}/{{ $t->id }}" class="btn btn-success">Renew</a>
                            <a href="{{ url('delete') }}/{{ $t->id }}" class='btn btn-danger'>Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection