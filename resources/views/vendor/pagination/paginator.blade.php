@if ($paginator->hasPages())
    <div class="toolbox toolbox-pagination justify-content-between">
        <p class="showing-info mb-2 mb-sm-0">
            Показано <span>{{ $paginator->count() }} из {{$paginator->total()}}</span>
        </p>
        <ul class="pagination">
            @if (!$paginator->onFirstPage())
                <li class="prev disabled">
                    <a href="{{ $paginator->previousPageUrl() }}" aria-label="Назад" tabindex="-1" aria-disabled="true">
                        <i class="w-icon-long-arrow-left"></i>Назад
                    </a>
                </li>
            @endif

            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="page-item active">
                        <a class="page-link">{{ $element }}</a>
                    </li>
                @endif
                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active">
                                <a class="page-link">{{ $page }}</a>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach
            @if ($paginator->hasMorePages())
                <li class="next">
                    <a href="{{ $paginator->nextPageUrl() }}" aria-label="Next">
                        Далее <i class="w-icon-long-arrow-right"></i>
                    </a>
                </li>
            @endif
        </ul>
    </div>


@endif
