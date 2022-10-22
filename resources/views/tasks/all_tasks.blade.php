@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">New Task in {{ $task ->task}}</div>

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
                    <form action="{{ route('task.store', $task->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label>Image</label>
                            <input type="file" name="image" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label>Expire</label>
                            <input type="date" name="expire" class="form-control">
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
                            <th>Name</th>
                            <th>Image</th>
                            <th>Expire</th>
                            <th>Actions</th>
                        </tr>
                        @foreach ($tasks as $task)
                            <tr>
                                <td>{{ $task->name }}</td>
                                <td><img width="80" src="{{ asset('uploads/'.$task->image) }}" alt=""></td>
                                <td>{{ $task->expire }}</td>
                                <td>
                                    <a class="btn btn-primary btn-sm" href="{{ route('task.edit', $task->id) }}"><i class="fas fa-edit"></i> Edit</a>
                                    <form class="d-inline" action="{{ route('task.destroy', $task->id) }}" method="POST">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')"><i class="fas fa-trash"></i> Delete</button>
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
