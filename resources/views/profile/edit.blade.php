@extends('layouts.app')

@section('content')
<div class="container">
  <h2>Edit Profile</h2>

  <!-- Success and Error messages -->
  @if (session('success'))
  <div class="alert alert-success">
    {{ session('success') }}
  </div>
  @endif

  @if ($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif

  <!-- Profile edit form -->
  <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <!-- Name -->
    <div class="mb-3">
      <label for="name" class="form-label">Name</label>
      <input type="text" class="form-control" id="name" name="name" value="{{ Auth::user()->name }}" required>
    </div>

    <!-- Email -->
    <div class="mb-3">
      <label for="email" class="form-label">Email</label>
      <input type="email" class="form-control" id="email" name="email" value="{{ Auth::user()->email }}" required>
    </div>

    <!-- Profile Picture -->
    <div class="mb-3">
      <label for="profile_pic" class="form-label">Profile Picture</label>
      <input type="file" class="form-control" id="profile_pic" name="profile_pic">
    </div>

    <!-- Submit -->
    <button type="submit" class="btn btn-primary">Save Changes</button>
  </form>
</div>
@endsection