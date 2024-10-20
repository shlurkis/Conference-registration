@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Conferences</h1>
    <a href="{{ route('conferences.create') }}" class="btn btn-primary mb-3">Create Conference</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($conferences as $conference)
                <tr>
                    <td>{{ $conference->name }}</td>
                    <td>{{ $conference->description }}</td>
                    <td>{{ $conference->date }}</td>
                    <td>
                        <a href="{{ route('conferences.edit', $conference) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('conferences.destroy', $conference) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
