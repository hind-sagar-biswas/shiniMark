<x-layout :pageTitle="$pageTitle">
    <div class="container">
        <div class="list-group">
            @foreach ($websiteList as $website)
                <a target="_blank" href="{{ $website->url }}" class="list-group-item d-flex justify-content-between align-items-center list-group-item-action text-danger">
                    {{ $website->name }}
                    @if ($website->restriction)
                        <span class="badge badge-danger badge-pill">18+</span>
                    @endif
                </a>
            @endforeach
        </div>
    </div>
</x-layout>