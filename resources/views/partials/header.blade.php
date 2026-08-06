<header style="padding:1rem;background:#0b5;">
    <div class="container">
        <h1><a href="{{ route('home') }}">{{ $settings['site.title'] ?? 'Real Estate Co.' }}</a></h1>
        <nav>
            <a href="{{ route('home') }}">Home</a> |
            <a href="{{ route('about') }}">About</a> |
            <a href="{{ route('services.index') }}">Services</a> |
            <a href="{{ route('contact.show') }}">Contact</a>
        </nav>
    </div>
</header>
