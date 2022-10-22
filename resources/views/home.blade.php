@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('New Task') }}</div>

                <div class="card-body">
                    <form action="{{ route('add_task') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label>Task</label>
                            <input type="text" name="task" class="form-control">
                        </div>
                        <button class="btn btn-success"><i class="fas fa-plus"></i> Add Task</button>
                    </form>
                </div>
            </div>

            <div class="card mt-4">
                <div class="card-header">{{ __('Current Tasks') }}</div>

                <div class="card-body">
                    <table class="table table-striped">
                        <tr>
                            <th>Task</th>
                            <th></th>
                        </tr>
                        @foreach ($tasks as $task)
                        <tr>
                            <td><a href="{{ route('task.single', $task->id) }}">{{ $task->task }}</a></td>
                            <td>
                                <form action="{{ route('delete_task', $task->id) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button onclick="return confirm('Are you sure?')" class="btn  btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</button>
                                </form>
                                </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>


    </div>
</div>
@endsection
