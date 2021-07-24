@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Create Todo
                    </div>
                    <div class="card-body">
                        <form action="{{ route('todo.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="my-input">Enter Todo</label>
                                <input id="my-input" class="form-control" value="{{ old('todo') }}"
                                    placeholder="Enter Todo" type="text" name="todo">
                                @error('todo')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <input id="description" class="form-control" value="{{ old('description') }}"
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
