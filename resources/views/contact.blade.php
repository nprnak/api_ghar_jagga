@extends('layouts.app')

@section('content')
    <h2>Contact Us</h2>

    @if(session('success'))
        <div style="background:#dfd;padding:1rem">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('contact.store') }}">
        @csrf
        <div>
            <label>Name</label>
            <input name="name" value="{{ old('name') }}">
        </div>
        <div>
            <label>Email</label>
            <input name="email" value="{{ old('email') }}">
        </div>
        <div>
            <label>Phone</label>
            <input name="phone" value="{{ old('phone') }}">
        </div>
        <div>
            <label>Subject</label>
            <input name="subject" value="{{ old('subject') }}">
        </div>
        <div>
            <label>Message</label>
            <textarea name="message">{{ old('message') }}</textarea>
        </div>
        <button type="submit">Send</button>
    </form>

    <h3>Office Location</h3>
    <div id="map" style="height:300px;width:100%;background:#eee">Google Map here</div>
    <script>
        // Placeholder for Google Maps JS integration; add API key and init later
    </script>

@endsection
