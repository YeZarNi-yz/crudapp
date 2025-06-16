@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('Edit User') }}</div>

        <div class="card-body">
          <form action="{{ route('users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
            </div>

            <div class="form-group mt-2">
              <label for="email">Email</label>
              <input type="email" id="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
            </div>

            <div class="form-group mt-2">
              <label for="role">Role</label>
              <select id="role" name="role" class="form-control" required
                @if (Auth::user()->role == 'admin' && Auth::user()->id == $user->id) disabled @endif>
                <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User</option>
                <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
              </select>
            </div>

            <div class="form-group mt-3">
              <button type="submit" class="btn btn-primary">Update User</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection