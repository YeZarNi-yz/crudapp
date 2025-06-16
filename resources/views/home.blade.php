@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('Dashboard') }}</div>

        <div class="card-body">
          {{-- Display Success or Error Messages --}}
          @if (session('status'))
          <div class="alert alert-success" role="alert">
            {{ session('status') }}
          </div>
          @endif

          @if (session('error'))
          <div class="alert alert-danger" role="alert">
            {{ session('error') }}
          </div>
          @endif

          <h1>Welcome, {{ Auth::user()->name }}!</h1>

          <div class="card mt-3">
            <div class="card-body">
              <p><strong>Username:</strong> {{ Auth::user()->name ?? 'N/A' }}</p>
              <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
              <p><strong>Role:</strong> {{ Auth::user()->role ?? 'user' }}</p>
              <p>{{ __('You are logged in!') }}</p>
            </div>
          </div>


          @if (Auth::user()->role == 'admin')
          <a href="{{ route('users.manage') }}" class="btn btn-primary mb-3">Manage Users</a>
          @endif

        </div>
      </div>
    </div>
  </div>
</div>
@endsection