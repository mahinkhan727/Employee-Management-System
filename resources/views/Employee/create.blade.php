@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-9">
                <h3>Create Employee</h3>
            </div>
            <div class="col-3">
                <a href={{ route('employee.index') }}><button type="button" class="btn btn-outline-primary">Back</button></a>
            </div>
        </div>
        <form class="row g-3" method="POST" action="{{ route('employee.store') }}">
            @if (Session::has('success'))
                <div class="alert alert-success">{{ Session::get('success') }}</div>
            @endif
            @if (Session::has('fail'))
                <div class="alert alert-danger">{{ Session::get('fail') }}</div>
            @endif

            @csrf

            <div class="col-md-4">
                <label for="name" class="form-label">Name</label>
                <input type="name" class="form-control" id="name" placeholder="Mahin" name="name" required>

                <small class="text-danger">
                    @error('name')
                        {{ $message }}
                    @enderror
                </small>

            </div>
            <div class="col-md-4">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" placeholder="mahin@gmail.com"
                    name="email"required>
            </div>
            <div class="col-md-4">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" class="form-control" id="phone" placeholder="01**********" name="phone"
                    required>
            </div>
            <div class="col-12">
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control" id="address" placeholder="Address" name="address">
            </div>
            <div class="col-md-6">
                <select class="form-select" aria-label="Default select example" name="dem_name">
                    <option selected value="">Select Department</option>
                    @foreach ($dep as $department)
                        <option value="{{ $department['id'] }}">{{ $department['name'] }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <select class="form-select" aria-label="Default select example" name="ach_name">
                    <option selected value="">Select Achievement</option>
                    @foreach ($ach as $achieve)
                        <option value="{{ $achieve['id'] }}">{{ $achieve['name'] }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-outline-success">Submit</button>
            </div>
        </form>
    </div>
@endsection
