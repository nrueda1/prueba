@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tasks</h1>
    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <input type="text" name="title" class="form-control" placeholder="Title" required>
        </div>
        <div class="form-group">
            <textarea name="description" class="form-control" placeholder="Description"></textarea>
        </div>
        <div class="form-group">
            <input type="date" name="due_date" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Task</button>
    </form>

    <ul class="list-group mt-4">
        @foreach ($tasks as $task)
            <li class="list-group-item">
                <strong>{{ $task->title }}</strong> - Due: {{ $task->due_date }}
                @if (!$task->completed)
                    <a href="{{ route('tasks.update', $task) }}" class="btn btn-success btn-sm float-right">Complete</a>
                @else
                    <span class="badge badge-success float-right">Completed</span>
                @endif
            </li>
        @endforeach
    </ul>

    {{ $tasks->links() }}
</div>
@endsection
