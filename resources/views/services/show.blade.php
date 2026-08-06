@extends('layouts.app')

@section('content')
    <h2>{{ $service->title }}</h2>
    <p>{{ $service->description }}</p>
    <a href="{{ route('services.index') }}">Back to services</a>
@endsection
