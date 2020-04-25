@if ($paginator->hasPages())
    <nav class="pagination is-rounded is-small">
        
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                
                <span class="pagination-previous" aria-hidden="true">&lsaquo; Previous</span>
              
            @else
                
                <a class="pagination-previous" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo; Previous</a>
                
            @endif

             {{-- Next Page Link --}}
             @if ($paginator->hasMorePages())
     
             <a class="page-link pagination-next" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">Next &rsaquo;</a>
           
             @else
             
                 <span class="page-link pagination-next" aria-hidden="true">Next &rsaquo;</span>
         
            @endif

            {{-- Pagination Elements --}}
            <ul class="pagination-list">

            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="page-item pagination-ellipsis" aria-disabled="true"><span class="page-link">{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active" aria-current="page"><span class="page-link pagination-link is-current">{{ $page }}</span></li>
                        @else
                            <li class="page-item"><a class="page-link pagination-link" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach
            </ul>
           
        
    </nav>
@endif
