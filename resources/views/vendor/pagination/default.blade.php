@if ($paginator->hasPages())
    <div class="ec-pro-pagination">
        <span>Всего {{$paginator->total()}} элементов</span>
        <ul class="ec-pro-pagination-inner">
            {{-- Previous Page Link --}}
            @if (!$paginator->onFirstPage())
                <li><a class="next" href="{{ $paginator->previousPageUrl() }}"><i class="ecicon eci-angle-left"></i> &nbsp; Назад </a></li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="disabled" aria-disabled="true"><span>{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li><a class="active" href="#">{{ $page }}</a></li>
                        @else

                            <li><a href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li><a class="next" href="{{ $paginator->nextPageUrl() }}">Далее <i class="ecicon eci-angle-right"></i></a></li>

            @endif
        </ul>
    </div>
@endif
