@extends('layouts.app')

@section('content')
    <section>
        <h2>Welcome to {{ $settings['site.title'] ?? 'Our Company' }}</h2>
        <p>{{ $settings['site.tagline'] ?? 'We provide top real estate services.' }}</p>
    </section>

    <section>
        <h3>Services</h3>
        <ul>
            @foreach($services as $service)
                <li><a href="{{ route('services.show', $service) }}">{{ $service->title }}</a></li>
            @endforeach
        </ul>
    </section>

    <section>
        <h3>Projects</h3>
        <div>
            @foreach($projects as $project)
                <article>
                    <h4>{{ $project->title }}</h4>
                    <p>{{ $project->excerpt }}</p>
                </article>
            @endforeach
        </div>
    </section>

    <section>
        <h3>Latest News</h3>
        @foreach($posts as $post)
            <article>
                <h4>{{ $post->title }}</h4>
                <p>{{ $post->excerpt }}</p>
            </article>
        @endforeach
    </section>

@endsection
