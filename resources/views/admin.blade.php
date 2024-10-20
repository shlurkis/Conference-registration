@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Admin Dashboard</h1>
    <p>Manage Conferences and Users from this dashboard.</p>
    <div class="btn-group" role="group" aria-label="Admin Actions">
        <a href="{{ route('conferences.index') }}" class="btn btn-primary">Manage Conferences</a>
        <a href="{{ route('users.index') }}" class="btn btn-secondary">Manage Users</a>
    </div>
</div>
@endsection