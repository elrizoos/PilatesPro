@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation">
        <ul>
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li aria-disabled="true">
                    <span>{!! __('pagination.previous') !!}</span>
                </li>
            @else
                <li>
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev">
                        {!! __('pagination.previous') !!}
                    </a>
                </li>
            @endif

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li>
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next">{!! __('pagination.next') !!}</a>
                </li>
            @else
                <li aria-disabled="true">
                    <span>{!! __('pagination.next') !!}</span>
                </li>
            @endif
        </ul>
    </nav>
@endif
