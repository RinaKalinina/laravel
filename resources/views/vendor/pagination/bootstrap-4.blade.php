@if ($paginator->hasPages())
    <div class="content-footer__container">
        <ul class="page-nav">
            {{-- Previous Page Link --}}
            @if (!$paginator->onFirstPage())
                <li class="page-nav__item">
                    <a href="{{ $paginator->previousPageUrl() }}" class="page-nav__item__link">
                        <i class="fa fa-angle-double-left"></i>
                    </a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="page-nav__item disabled" aria-disabled="true">
                        <span class="page-nav__item__link">{{ $element }}</span>
                    </li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-nav__item active" aria-current="page">
                                <a href="{{ $url }}" class="page-nav__item__link">{{ $page }}</a>
                            </li>
                        @else
                            <li class="page-nav__item">
                                <a href="{{ $url }}" class="page-nav__item__link">{{ $page }}</a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-nav__item">
                    <a href="{{ $paginator->nextPageUrl() }}" class="page-nav__item__link">
                        <i class="fa fa-angle-double-right"></i>
                    </a>
                </li>
            @endif
        </ul>
    </div>
@endif




