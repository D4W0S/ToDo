@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Delete</div>

                <!-- Go back Button -->
                <h5 class="card-header">
                    <a href="{{ route('todo.index') }}" class="btn btn-sm btn-outline-primary"><i class="fa fa-arrow-left"></i> Go back</a>
                </h5>

                <div class="card-body">

                    <!-- Errors -->
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('todo.destroy', $todo->id) }}">
                        @csrf
                        @method('DELETE')
                        
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-2">
                                <center>
                                <h3>
                                    Are you sure you want to delete {{ $todo->delete }} ?
                                </h3>
                            </div>
                        </div>
                         <!-- Submit -->
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-5">
                                <button type="submit" class="btn btn-success">
                                   Yes
                                </button>
                                <a href="{{ route('todo.index')}} " class="btn btn-danger">No</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
