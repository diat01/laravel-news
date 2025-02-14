<div class="container py-4">
    <img src="{{ asset('storage/' . $news->image) }}" class="img-fluid mb-4 mx-auto d-block rounded" alt="{{ $news->name }}">
    <h1 class="text-center mb-4">{{ $news->name }}</h1>
    <h4 class="text-body-secondary mb-4">{{ __('Author:') . ' ' . $news->author->name }}</h4>
    <hr class="border-top border-3 border-dark">
    <p class="lead">{{ $news->description }}</p>
    <div class="d-flex text-body-secondary">
        <p class="ms-auto">
            {{ $news->created_at->format('j M Y') }}
        </p>
    </div>
    <a href="{{ route('news.index') }}" class="btn btn-secondary">{{ __('Go Back') }}</a>
</div>
