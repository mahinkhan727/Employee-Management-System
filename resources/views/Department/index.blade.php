@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-9">
                <h3>Department List</h3>
            </div>
            @if (Session::has('detele_message'))
                <div class="alert alert-danger">{{ Session::get('detele_message') }}</div>
            @endif
            <div class="col-3">
                <a href={{ route('department.create') }}><button type="button" class="btn btn-outline-success">Create
                        Department</button></a>
            </div>
        </div>
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $dep)
                    <tr>
                        <th scope="row">{{ $dep['id'] }}</th>
                        <th scope="row">{{ $dep['name'] }}</th>
                        <th scope="row">
                            <a href={{ route('department.edit', $dep['id']) }}><button type="button"
                                    class="btn btn-outline-primary">Edit</button></a>

                            <form method="POST" action="{{ route('department.destroy', $dep['id']) }}">
                                @method('delete')
                                @csrf
                                <input type="hidden">
                                <button type="submit" class="btn btn-outline-danger">Delete</button>
                            </form>
                        </th>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
