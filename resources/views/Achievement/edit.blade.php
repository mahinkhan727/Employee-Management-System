@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-9">
                <h3>Create Achievement</h3>
            </div>
            <div class="col-3">
                <a href={{ route('achievement.index') }}><button type="button" class="btn btn-outline-primary">Back</button></a>
            </div>
        </div>
        <form class="row g-3" method="POST" action="{{ route('achievement.update',$send[0]->id) }}">
            @csrf
            @method('PUT')

            @if (Session::has('success'))
                <div class="alert alert-success">{{ Session::get('success') }}</div>
            @endif
            @if (Session::has('fail'))
                <div class="alert alert-danger">{{ Session::get('fail') }}</div>
            @endif

            <div class="col-md-4">
                <label for="name" class="form-label">Name</label>
                <input type="name" class="form-control" id="name" value="{{ $send[0]->name }}" name="name" required>

            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-outline-success">Update</button>
            </div>
        </form>
    </div>
@endsection
