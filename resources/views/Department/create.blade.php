@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-9">
                <h3>Create Department</h3>
            </div>
            <div class="col-3">
                <a href={{ route('department.index') }}><button type="button" class="btn btn-outline-primary">Back</button></a>
            </div>
        </div>
        <form class="row g-3" method="POST" action="{{ route('department.store') }}">
            @if (Session::has('success'))
                <div class="alert alert-success">{{ Session::get('success') }}</div>
            @endif
            @if (Session::has('fail'))
                <div class="alert alert-danger">{{ Session::get('fail') }}</div>
            @endif
            @csrf
            <div class="row g-3">
                <label for="name" class="form-label col-4">Name</label>
                <input type="name" class="form-control col-2" id="name" placeholder="Department Name" name="name" required>

                <small class="text-danger">
                    @error('name')
                    {{ $message }}
                    @enderror
                </small>

                <button type="submit" class="btn btn-outline-success col-4">Submit</button>
            </div>

        </form>
    </div>
@endsection
