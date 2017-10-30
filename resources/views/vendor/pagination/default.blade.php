@if ($paginator->hasPages())
    <nav class="pagination is-centered">

        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <a href="" class="pagination-previous" disabled="">Previous</a>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" class="pagination-previous" rel="prev">Previous</a>
        @endif
        <ul class="pagination-list">
            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="disabled"><span class="pagination-ellipsis">{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="active">
                                <a href="" class="pagination-link is-current"> {{ $page }}</a>
                            </li>
                        @else
                            <li><a href="{{ $url }}" class="pagination-link">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach
        </ul>

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="pagination-next" rel="next">Next page</a>
        @else
            <a href="" class="pagination-next" disabled>Next page</a>
        @endif

    </nav>

@endif
