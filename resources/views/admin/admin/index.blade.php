@extends('admin.layouts.master')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card shadow  mt-5">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title mb-0">Admins Table</h3>
                    <form class="form-inline ml-auto">
                        <input type="text" name="table_search" class="form-control form-control-sm mr-2" placeholder="Search">
                        <button type="submit" class="btn btn-sm btn-outline-secondary">
                            <i class="fas fa-search"></i>
                        </button>
                    </form>
                </div>

                <div class="card-body table-responsive bg-light p-0">
                    <table class="table table-hover text-nowrap mb-0">
                        <thead class="thead-light">
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th class="text-center">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td class="text-center">
                                    <a href="{{ route('admin.edit', $user) }}" class="btn btn-sm btn-success mr-1">Edit</a>
                                    <a href="{{ route('admin.delete', $user) }}" class="btn btn-sm btn-danger">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection

