@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Conferences and Attendees</h1>
    <ul class="list-group">
        @foreach($conferences as $conference)
            <li class="list-group-item">
                <h5>{{ $conference->name }}</h5>
                <p>Attendees:</p>
                <ul>
                    @if($conference->users->isEmpty())
                        <li>No attendees yet.</li>
                    @else
                        @foreach($conference->users as $attendee)
                            <li>{{ $attendee->name }} ({{ $attendee->email }})</li>
                        @endforeach
                    @endif
                </ul>
            </li>
        @endforeach
    </ul>
</div>
@endsection
