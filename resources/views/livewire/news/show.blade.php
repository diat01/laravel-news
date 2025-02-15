<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <img src="{{ asset('storage/' . $news->image) }}" class="img-fluid mb-4 mx-auto d-block rounded" alt="{{ $news->name }}">
        </div>
    </div>

    <h1 class="text-center mb-4">{{ $news->name }}</h1>
    <h4 class="text-body-secondary mb-4">{{ __('Author:') . ' ' . $news->author->name }}</h4>
    <hr class="border-top border-3 border-dark">

    <p class="lead">{{ $news->description }}</p>

    <div class="row justify-content-between align-items-center">
        <div class="col-md-6">
            <p class="text-body-secondary mb-0">
                {{ $news->created_at->format('j M Y') }}
            </p>
        </div>
        <div class="col-md-6 text-md-end">
            <a href="{{ route('news.index') }}" class="btn btn-secondary">{{ __('Go Back') }}</a>
        </div>
    </div>
</div>
