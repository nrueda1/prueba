<!DOCTYPE html>
<html>
<head>
    <title>Task Created</title>
</head>
<body>
    <p>A new task has been created:</p>
    <p><strong>{{ $task->title }}</strong></p>
    <p>{{ $task->description }}</p>
    <p>Due Date: {{ $task->due_date }}</p>
</body>
</html>
