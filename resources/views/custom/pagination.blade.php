@if ($paginator->hasPages())
    <ul class=" actions pagination" role="navigation">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="disabled " aria-disabled="true"><span>Previous page</span></li>
        @else
            <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="button big previous">Previous page</a></li>
        @endif

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li><a href="{{ $paginator->nextPageUrl() }}" rel="next" class="button big next">Next Page</a></li>
        @else
            <li class="disabled" aria-disabled="true"><span>Next Page</span></li>
        @endif
    </ul>
@endif
