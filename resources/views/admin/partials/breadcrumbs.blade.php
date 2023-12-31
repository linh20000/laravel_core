@if (isset($breadcrumbs))
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            @foreach ($breadcrumbs as $breadcrumb)
                @if ($loop->last)
                    <li class="breadcrumb-item active" aria-current="page">{{ Translate($breadcrumb['title']) }}</li>
                @else
                    <li class="breadcrumb-item"><a href="{{ $breadcrumb['url'] }}">{{ Translate($breadcrumb['title']) }}</a></li>
                @endif
            @endforeach
        </ol>
    </nav>
@endif
