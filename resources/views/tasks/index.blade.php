<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>@lang(Tasks)</title>
</head>
<body>
    <h4>@lang(Tasks List)</h4>
    <div class="container">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>@lang(ID)</th>
                    <th>@lang(Title)</th>
                    <th>@lang(Description)</th>
                    <th>@lang(Created At)</th>
                    <th>@lang(Updated At)</th>
                    <th>@lang(Actions)</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tasks as $task)
                    <tr>
                        <td>{{ $task->id }}</td>
                        <td>{{ $task->title }}</td>
                        <td>{{ $task->description }}</td>
                        <td>{{ $task->created_at }}</td>
                        <td>{{ $task->updated_at }}</td>
                        <td>
                            <a href="{{ route('tasks.show', $task) }}">@lang(View)</a> |
                            <a href="{{ route('tasks.edit', $task) }}">@lang(Edit)</a> |
                            <form action="{{ route('tasks.destroy', $task) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('@lang(Are you sure?)')">@lang(Delete)</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $tasks->links() }}

    </div>
</body>
</html>
