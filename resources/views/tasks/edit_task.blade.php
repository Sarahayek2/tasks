@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Task <b>{{ $task->name}}</b></div>

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
                    <form action="{{ route('task.update', $task->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')

                        <div class="mb-3">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" value="{{ $task->name }}">
                        </div>
                        <div class="mb-3">
                            <label>Image</label>
                            <input type="file" name="image" class="form-control">
                            <img width="80" src="{{ asset('uploads/'.$task->image) }}" alt="">
                        </div>
                        <div class="mb-3">
                            <label>Expire</label>
                            <input type="date" name="expire" class="form-control" value="{{ $task->expire }}">
                        </div>
                        <button class="btn btn-success"><i class="fas fa-save"></i> Update Task</button>
                    </form>
                </div>
            </div>
        </div>


    </div>
</div>
@endsection
