@extends('admin.layouts.master')

@section('content')
    <div class="container" style="padding-top: 35px; max-width: 500px;">
        <div class="card shadow-sm">
            <div class="card-header bg-gradient-maroon text-white">
                <h4 class="mb-0">Edit User</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.update', [$admin]) }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input
                            type="text"
                            id="name"
                            name="name"
                            class="form-control"
                            value="{{ old('name', $admin->name) }}"
                            required
                            placeholder="Enter user name">
                    </div>

                    <div class="form-group mt-3">
                        <label for="email">Email address</label>
                        <input
                            type="email"
                            id="email"
                            name="email"
                            class="form-control"
                            value="{{ old('email', $admin->email) }}"
                            required
                            placeholder="Enter email">
                    </div>

                    <div class="d-flex justify-content-between mt-4">
                        <a href="{{ route('admin.index') }}" class="btn btn-secondary">Cancel</a>
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
