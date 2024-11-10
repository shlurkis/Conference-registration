@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Conference</h2>
    
    <form action="{{ route('admin.conferences.update', $conference) }}" method="POST">
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
        
        <button type="submit" class="btn btn-primary">Update Conference</button>
    </form>

    <h3 class="mt-4">Participants</h3>
    <ul class="list-group">
        @forelse($participants as $participant)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                {{ $participant->name }} ({{ $participant->email }})
                
                <form action="{{ route('admin.conferences.removeParticipant', ['conference' => $conference->id, 'user' => $participant->id]) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to remove this participant?')">Remove</button>
                </form>
            </li>
        @empty
            <li class="list-group-item">No participants registered for this conference.</li>
        @endforelse
    </ul>
</div>
@endsection
