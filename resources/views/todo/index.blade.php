@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            @if (Session::has('message'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('message') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            <div class="card-header">
                                Our Todos
                                @auth

                                    <a href="{{ route('todo.create') }}" class="btn btn-primary float-right">Add Todos</a>
                                @endauth
                            </div>
                            <div class="card-body">
                                <table class="table table-light">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>Status</th>
                                            <th>Sr No:</th>
                                            <th>Todos</th>
                                            <th>Description</th>
                                            @auth

                                                <th>Action</th>
                                            @endauth
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $sr = 1;
                                        @endphp
                                        @foreach ($tasks as $task)
                                            <tr>
                                                @if ($task->iscompleted == 0)
                                                    <td><button class="btn btn-danger">Pending</button></td>
                                                @else

                                                    <td><button class="btn btn-success">Completed</button></td>
                                                @endif
                                                <td>{{ $sr++ }}</td>
                                                <td>{{ $task->todo }}</td>
                                                <td>{{ $task->description }}</td>
                                                @auth

                                                    <td>
                                                        <a href="/todos/edit/{{ $task->id }}"
                                                            class="btn btn-primary">Edit</a>
                                                        <a href="/todos/delete/{{ $task->id }}"
                                                            class="btn btn-danger">Delete</a>

                                                        <a href="/todos/status/{{ $task->id }}"
                                                            class="btn btn-primary">Complete</a>

                                                    </td>
                                                @endauth

                                            </tr>
                                    </tbody>


                                    @endforeach
                                </table>


                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>

    </script>
@endsection
