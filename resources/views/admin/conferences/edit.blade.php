@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Conference</h1>

    <form action="{{ route('conferences.update', $conference) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" value="{{ $conference->name }}" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control" required>{{ $conference->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="date">Date</label>
            <input type="date" name="date" class="form-control" value="{{ $conference->date }}" required>
        </div>
        <button type="submit" class="btn btn-warning">Update</button>
    </form>
</div>
@endsection
