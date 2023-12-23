<div class="div">
    @extends('layouts.app')
    @section('content')
        <div class="container">
            <div class="row">
                <div class="col-9">
                    <h3>Employee List</h3>
                </div>
                @if (Session::has('detele_message'))
                    <div class="alert alert-danger">{{ Session::get('detele_message') }}</div>
                @endif
                <div class="col-3">
                    <form method="GET" action="{{ route('employee.index') }}" class="form-inline">
                        <div class="input-group">
                            <input type="text" class="form-control" name="query" placeholder="Search...">
                            <button type="submit" class="btn btn-outline-secondary">Search</button>
                        </div>
                    </form>
                </div>
                <div class="col-3">
                    <a href={{ route('employee.create') }}><button type="button" class="btn btn-outline-success">Create
                            Employee</button></a>
                </div>
            </div>
            <table class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Department</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Address</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($employees as $emp)
                        <tr>
                            <th scope="row">{{ $emp['id'] }}</th>
                            @foreach ($dep as $d)
                                @if ($emp['dept_id'] == $d['id'])
                                    <th scope="row">{{ $d['name'] }}</th>
                                @endif
                            @endforeach


                            <th scope="row">{{ $emp['name'] }}</th>
                            <th scope="row">{{ $emp['email'] }}</th>
                            <th scope="row">{{ $emp['phone'] }}</th>
                            <th scope="row">{{ $emp['address'] }}</th>
                            <th scope="row">
                                <div class="d-flex gap-2">

                                    <a href={{ route('employee.edit', $emp['id']) }}><button type="button"
                                            class="btn btn-outline-primary">Edit</button></a>

                                    <form method="POST" action="{{ route('employee.destroy', $emp['id']) }}">
                                        @method('delete')
                                        @csrf
                                        <input type="hidden">
                                        <button type="submit" class="btn btn-outline-danger">Delete</button>
                                    </form>
                                </div>
                            </th>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $employees->appends(['query' => isset($query) ? $query : ''])->links('custom-pagination') }}

        </div>
    @endsection

</div>
