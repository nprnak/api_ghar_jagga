@extends('layouts.app')

@section('content')
    <h2>About Us</h2>
    <p>{{ $settings['company.description'] ?? 'Company description goes here.' }}</p>

    <h3>Vision</h3>
    <p>{{ $settings['company.vision'] ?? '' }}</p>

    <h3>Mission</h3>
    <p>{{ $settings['company.mission'] ?? '' }}</p>

@endsection
