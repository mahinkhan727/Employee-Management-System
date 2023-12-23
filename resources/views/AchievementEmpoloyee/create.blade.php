@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mb-3">
            <div class="col-9">
                <h3>Create Achievement</h3>
            </div>
            <div class="col-3">
                <a href={{ route('achemp.index') }}><button type="button" class="btn btn-outline-primary">Back</button></a>
            </div>
        </div>
        <form class="row g-3" method="POST" action="{{ route('achemp.store') }}">
            @if (Session::has('success'))
                <div class="alert alert-success">{{ Session::get('success') }}</div>
            @endif
            @if (Session::has('fail'))
                <div class="alert alert-danger">{{ Session::get('fail') }}</div>
            @endif

            @csrf

            <div class="col-md-6 ">
                <select class="form-select" aria-label="Default select example" name="emp_name">
                    <option selected value="">Select Empolyee</option>
                    @foreach ($bil as $emp)
                        <option value="{{ $emp['id'] }}">{{ $emp['name'] }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6 ">
                <select class="form-select" aria-label="Default select example" name="ach_name">
                    <option selected value="">Select Achievement</option>
                    @foreach ($pass as $ach)
                        <option value="{{ $ach['id'] }}">{{ $ach['name'] }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-outline-success">Submit</button>
            </div>
        </form>
    </div>
@endsection
