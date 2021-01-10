<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Daily Task App</title>
</head>
<body>
    <div class="container">
        <div class="text-center">
            <h1>Daily Tasks</h1>
            <div class="row">
                <div class="col">
                    @foreach($errors->all() as $error)
                    <div class="alert alert-danger" role="alert">{{$error}}</div>
                    @endforeach
                    <form action="/savetask" method="post">
                    {{csrf_field()}}
                        <input type="hidden" id="taskid" name="taskid">
                        <input type="text" class="form-control" id="task" name="task" placeholder="Enter your tasks">
                        </br>
                        <input type="submit" class="btn btn-primary" value="SAVE">
                        <input type="button" class="btn btn-warning" value="Clear">
                    </form>
                    <table class="table table-dark" style="margin-top: 10px">
                        <th>ID</th>
                        <th>Task</th>
                        <th>Complete</th>
                        <th>Action</th>
                        @foreach($datatasks as $task)
                        <tr>
                            <td>{{$task->id}}</td>
                            <td>{{$task->task}}</td>
                            <td>
                                @if($task->iscompleted)
                                    <button class="btn btn-sm btn-success">completed</button>
                                @else
                                    <button class="btn btn-sm btn-warning">not completed</button>
                                @endif
                            </td>
                            <td>
                            @if($task->iscompleted)
                                <a href="/markascomplete/{{$task->id}}" class="btn btn-sm btn-danger">Mark as not complete</a>
                            @else
                                <a href="/markascomplete/{{$task->id}}" class="btn btn-sm btn-primary">Mark as complete</a>
                            @endif
                            <button class="btn btn-sm btn-success" onclick="updateClick('{{$task}}')">Update</button>
                            <a href="/deletetask/{{$task->id}}" class="btn btn-sm btn-warning">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </table>

                </div>
            </div>
        </div>
    </div>
</body>

<script>
function updateClick(e) {
    let obj = JSON.parse(e);
    document.getElementById("taskid").value = obj.id;
    document.getElementById("task").value = obj.task;
}
</script>

</html>