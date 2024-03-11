@if ($paginator->hasPages())
    <nav>
        <div class="row align-items-center">
            <div class="col-md-6 col-sm-12 col-12 d-flex justify-content-md-start justify-content-sm-center justify-content-center">
                <p class="text-muted">showing &nbsp;{{ $paginator->firstItem() }} &nbsp;to &nbsp;{{ $paginator->lastItem() }}
                    &nbsp;of &nbsp;{{ $paginator->total() }} &nbsp;entries</p>
            </div>

            <div class="col-md-6 col-sm-12 col-12 d-flex justify-content-md-end justify-content-sm-center justify-content-center">
                <ul class="pagination">

                    {{-- Previous Page Link --}}
                    @if ($paginator->onFirstPage())
                        <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                            <span class="page-link" aria-hidden="true">&lsaquo;&nbsp;&lsaquo;</span>
                        </li>
                    @else
                        <li class="page-item">
                            <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev"
                               aria-label="@lang('pagination.previous')">&lsaquo;&nbsp;&lsaquo;</a>
                        </li>
                    @endif

                    {{-- Pagination Elements --}}
                    @foreach ($elements as $element)
                        {{-- "Three Dots" Separator --}}
                        @if (is_string($element))
                            <li class="page-item disabled" aria-disabled="true"><span class="page-link">{{ $element }}</span>
                            </li>
                        @endif

                        {{-- Array Of Links --}}
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <li class="page-item active" aria-current="page"><span class="page-link">{{ $page }}</span>
                                    </li>
                                @else
                                    <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    {{-- Next Page Link --}}
                    @if ($paginator->hasMorePages())
                        <li class="page-item">
                            <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next"
                               aria-label="@lang('pagination.next')">&rsaquo;&nbsp;&rsaquo;</a>
                        </li>
                    @else
                        <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                            <span class="page-link" aria-hidden="true">&rsaquo;&nbsp;&rsaquo;</span>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

@endif
