@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Available Conferences</h1>
    <ul class="list-group">
        @foreach($conferences as $conference)
            <li class="list-group-item">
                <h5>{{ $conference->name }}</h5>
                <button class="btn btn-info btn-sm" onclick="toggleDetails({{ $conference->id }})">Show More</button>

                <!-- hidden -->
                <div id="conference-details-{{ $conference->id }}" class="conference-details" style="display: none; margin-top: 10px;">
                    <p><strong>Description:</strong> {{ $conference->description }}</p>
                    <p><strong>Date:</strong> {{ $conference->date }}</p>

                    <form action="{{ route('register', $conference) }}" method="POST" style="margin-top: 10px;">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        <input type="hidden" name="conference_id" value="{{ $conference->id }}">
                        <button type="submit" class="btn btn-success">Register</button>
                    </form>
                </div>
            </li>
        @endforeach
    </ul>
</div>

<script>
    // button to show details
    function toggleDetails(conferenceId) {
        var detailsDiv = document.getElementById('conference-details-' + conferenceId);
        if (detailsDiv.style.display === "none") {
            detailsDiv.style.display = "block";
        } else {
            detailsDiv.style.display = "none";
        }
    }
</script>
@endsection
