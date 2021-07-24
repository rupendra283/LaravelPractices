@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Edit Todo
                    </div>
                    <div class="card-body">

                        <form action="{{ route('todo.update', $task->id) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="my-input">Enter Todo</label>
                                <input id="my-input" class="form-control" placeholder="Enter Todo"
                                    value="{{ $task->todo }}" type="text" name="todo">
                                @error('todo')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <input id="description" class="form-control" value="{{ $task->description }}"
                                    placeholder="Enter Task Description" type="text" name="description">
                            </div>
                            <button type="submit" class="btn btn-primary float-right">Submit</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <script>


    </script>


@endsection
