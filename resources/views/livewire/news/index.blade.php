<div class="container py-4">
    <div class="row">
        @foreach($news as $item)
            <div class="col-md-3 mb-4">
                <div class="card h-100">
                    <img
                        src="{{ $item->image != '' ? asset('storage/' . $item->image) : asset('thumbnails/300x300.png') }}"
                        class="card-img-top" alt="{{ $item->title }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->name }}</h5>
                    </div>
                    <div class="card-footer d-flex text-body-secondary">
                        <div class="ms-auto">
                            {{ $item->created_at->format('j M Y') }}
                        </div>
                    </div>
                    <a class="stretched-link" href="{{ route('news.show', $item->id) }}"></a>
                </div>
            </div>
        @endforeach
    </div>

    {{ $news->links('vendor.livewire.bootstrap') }}
</div>
