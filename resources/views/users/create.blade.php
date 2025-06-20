@extends('layouts.app')

@section('content')
<div class="container">
  <h2>Create User</h2>
  <form action="{{ route('users.store') }}" method="POST">
    @csrf
    <div class="form-group">
      <label for="name">Name</label>
      <input type="text" class="form-control" id="name" name="name" required>
    </div>
    <div class="form-group">
      <label for="email">Email</label>
      <input type="email" class="form-control" id="email" name="email" required>
    </div>
    <div class="form-group">
      <label for="role">Role</label>
      <select class="form-control" id="role" name="role">
        <option value="user">User</option>
        <option value="admin">Admin</option>
      </select>
    </div>

    <div class="form-group">
      <label for="password">Password</label>
      <input type="password" class="form-control" id="password" name="password" required>
    </div>

    <div class="form-group">
      <label for="password_confirmation">Confirm Password</label>
      <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
    </div>

    <button type="submit" class="btn btn-success mt-3">Create User</button>
  </form>
</div>
@endsection