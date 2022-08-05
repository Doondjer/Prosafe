@if($paginator->hasPages())
    <ul class="pagination m-0 ms-auto">
        {{-- Previous Page Link --}}
        <li class="page-item{{ $paginator->onFirstPage() ? ' disabled' : '' }}">
            <a class="page-link" href="{{ $paginator->previousPageUrl() ?? '#' }}" tabindex="-1" aria-disabled="{{ $paginator->onFirstPage() ? 'true' : 'false' }}">
                <!-- Download SVG icon from http://tabler-icons.io/i/chevron-left -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><polyline points="15 6 9 12 15 18"></polyline></svg>
                pred
            </a>
        </li>

        @foreach($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if(is_string($element))
                <li class="disabled"><span>{{ $element }}</span></li>
            @endif

            {{-- Array of Links --}}
            @if(is_array($element))
                @foreach($element as $page => $url)
                    <li class="page-item{{ $paginator->currentPage() == $page ? ' active' : '' }}"><a class="page-link" href="{{ $paginator->currentPage() == $page ? '#' : $url }}">{{ $page }}</a></li>
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        <li class="page-item{{ ! $paginator->hasMorePages() ? ' disabled' : '' }}">
            <a class="page-link" href="{{ $paginator->nextPageUrl()?? '#' }}" aria-disabled="{{ ! $paginator->hasMorePages() ? 'true' : 'false' }}">
                sled <!-- Download SVG icon from http://tabler-icons.io/i/chevron-right -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><polyline points="9 6 15 12 9 18"></polyline></svg>
            </a>
        </li>
    </ul>
@endif
