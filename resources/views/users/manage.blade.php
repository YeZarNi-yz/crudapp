@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('Manage Users') }}</div>

        <div class="card-body">
          <a href="{{ route('users.create') }}" class="btn btn-primary mb-3">Create User</a>

          <form action="{{ route('users.manage') }}" method="GET" class="mb-3">
            <div class="input-group">
              <input type="text" name="search" class="form-control" placeholder="Search users..." value="{{ request()->query('search') }}">
              <button class="btn btn-primary" type="submit">Search</button>
            </div>
          </form>

          <div class="card mt-4">
            <div class="card-header">{{ __('Users List') }}</div>
            <div class="card-body">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($users as $user)
                  <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role }}</td>
                    <td>
                      <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    </td>
                    <td>
                      <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
                      </form>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection