@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <!-- Add Button -->
                <h5 class="card-header">
                    <a href="{{ route('todo.create') }}" class="btn btn-sm btn-outline-primary">Add Item</a>
                </h5>

                <div class="card-body">
                    <!-- Status controler -->
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <!-- Main Table -->
                        <table class="table table-hover table-borderless">
                            <thead>
                                <th scope="col">Your ToDos:</th>
                                <th scope="col"></th>
                            </thead>
                            <tbody>
                                <!-- All Todos -->
                                @forelse ($todos as $todo)
                                 <tr>
                                     @if ($todo->completed)
                                        <td scope="row"><a href="{{ route('todo.edit', $todo->id) }}" style="color: black; text-decoration:none;"><s><b>{{ $todo->title }} -> </b></s></a>{{  $todo->description }}</td>
                                     @else
                                        <td scope="row"><a href="{{ route('todo.edit', $todo->id) }}" style="color: green; text-decoration:none;"><b>{{ $todo->title }} -> </b></a>{{  $todo->description }}</td>
                                     @endif
                                     <!-- Edit / Delete Buttons -->
                                    <td>
                                        <a href="{{ route('todo.edit', $todo->id) }}" class="btn btn-sm btn-outline-warning">Edit</a>
                                        <a href="{{ route('todo.show', $todo->id) }}" class="btn btn-sm btn-outline-danger">Delete</a>
                                    </td>
                                </tr>   
                                @empty
                                    <tr>
                                        <td><a href="{{ route('todo.create') }}">Create your first ToDo...</a></td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
