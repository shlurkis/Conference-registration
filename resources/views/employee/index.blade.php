@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Conferences and Attendees</h1>
    <ul class="list-group">
        @foreach($conferences as $conference)
            <li class="list-group-item">
                <h5>{{ $conference->name }}</h5>
                <button class="btn btn-info btn-sm" onclick="toggleDetails({{ $conference->id }})">Show More</button>

                <div id="conference-details-{{ $conference->id }}" class="conference-details" style="display: none; margin-top: 10px;">
                    <p><strong>Description:</strong> {{ $conference->description }}</p>
                    <p><strong>Date:</strong> {{ $conference->date }}</p>

                    <p><strong>Attendees:</strong></p>
                    <ul>
                        @if($conference->users->isEmpty())
                            <li>No attendees yet.</li>
                        @else
                            @foreach($conference->users as $attendee)
                                <li>{{ $attendee->name }} ({{ $attendee->email }})</li>
                            @endforeach
                        @endif
                    </ul>
                </div>
            </li>
        @endforeach
    </ul>
</div>

<script>
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
