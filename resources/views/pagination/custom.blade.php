@if ($paginator->hasPages())
    <div class="col-12 d-flex justify-content-center my-5">
        <div class="d-inline-block">
            @php
            $count_rows = $paginator->total();
            $result_per_page = $count_rows / $paginator->perPage();
            $ceil_page = ceil($result_per_page);
            @endphp

            @if ($paginator->currentPage() > 1)
                <a href="{{ $paginator->previousPageUrl() }}" class="category hvr-pop shadow mt-1">Pervious</a>
            @endif

            @for ($n = 1; $n <= $ceil_page; $n++)
                <a href="{{ $paginator->url($n) }}" class="category hvr-pop shadow mt-1 {{ $n == $paginator->currentPage() ? 'ac' : '' }}">{{ $n }}</a>
            @endfor

            @if ($paginator->currentPage() < $ceil_page)
                <a href="{{ $paginator->nextPageUrl() }}" class="category hvr-pop shadow mt-1">Next</a>
            @endif
        </div>
    </div>
@endif