@extends('layouts.app')

@section('content')
    <h2>Our Services</h2>
    <ul>
    @foreach($services as $service)
        <li><a href="{{ route('services.show', $service) }}">{{ $service->title }}</a> - {{ $service->excerpt }}</li>
    @endforeach
    </ul>
@endsection
