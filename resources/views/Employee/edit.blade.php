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
        <form class="row g-3" method="POST" action="{{ route('employee.update', $obj[0]->id) }}">
            @method('PUT')
            @csrf

            @if (Session::has('success'))
                <div class="alert alert-success">{{ Session::get('success') }}</div>
            @endif
            @if (Session::has('fail'))
                <div class="alert alert-danger">{{ Session::get('fail') }}</div>
            @endif

            <div class="col-md-4">
                <label for="name" class="form-label">Name</label>
                <input type="name" class="form-control" id="name" value="{{ $obj[0]->name }}" name="name"
                    required>

            </div>
            <div class="col-md-4">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" value="{{ $obj[0]->email }}"
                    name="email"required>
            </div>
            <div class="col-md-4">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" class="form-control" id="phone" value="{{ $obj[0]->phone }}" name="phone"
                    required>
            </div>
            <div class="col-12">
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control" id="address" value="{{ $obj[0]->address }}" name="address">
            </div>
            <div class="col-md-6">
                <select class="form-select" aria-label="Default select example" name="dem_name">
                    <option value="">Select Department</option>
                    @foreach ($d_data as $department)
                        @if ($obj[0]->dept_id == $department['id'])
                            <option selected value="{{ $department['id'] }}">{{ $department['name'] }}</option>
                        @else
                            <option value="{{ $department['id'] }}">{{ $department['name'] }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-outline-success">Update</button>
            </div>
        </form>
    </div>
@endsection
