@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-9">
                <h3>Achievement-Employee List</h3>
            </div>
            @if (Session::has('detele_message'))
                <div class="alert alert-danger">{{ Session::get('detele_message') }}</div>
            @endif
            <div class="col-3">
                <form method="GET" action="{{ route('achemp.index') }}" class="form-inline">
                    <div class="input-group">
                        <input type="text" class="form-control" name="query" placeholder="Search...">
                        <button type="submit" class="btn btn-outline-secondary">Search</button>
                    </div>
                </form>
            </div>
            <div class="col-3">
                <a href={{ route('achemp.create') }}><button type="button" class="btn btn-outline-success">Create
                        Achievement-Employee</button></a>
            </div>
        </div>
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Achievement ID</th>
                    <th scope="col">Achievement Name</th>
                    <th scope="col">Employee ID</th>
                    <th scope="col">Employee Name</th>
                    <th scope="col">Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pass as $achemp)
                    <tr>
                        <th scope="row">{{ $achemp['id'] }}</th>
                        <th scope="row">{{ $achemp['achievement_id'] }}</th>
                        @foreach ($sed as $ach)
                            @if ($achemp['achievement_id'] == $ach['id'])
                                <th scope="row">{{ $ach['name'] }}</th>
                            @endif
                        @endforeach

                        <th scope="row">{{ $achemp['employee_id'] }}</th>

                        @foreach ($emp as $empo)
                            @if ($achemp['employee_id'] == $empo['id'])
                                <th scope="row">{{ $empo['name'] }}</th>
                            @endif
                        @endforeach
                        <th scope="row">{{ $achemp['created_at'] }}</th>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{-- {{ $pass->links('custom-pagination') }} --}}
        {{ $pass->appends(['query' => isset($query) ? $query : ''])->links('custom-pagination') }}


    </div>
@endsection
