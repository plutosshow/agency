<div class="row w-100">
    <div class="col-12 text-center">
        <div class="site-pagination m-auto">
            @if ($paginator->lastPage() > 1)
                @for ($i = 1; $i <= $paginator->lastPage(); $i++)
                    <a class="{{ ($paginator->currentPage() == $i) ? ' active' : '' }}" href="{{ $paginator->url($i) }}">{{ $i }}</a>
                @endfor
            @endif
        </div>
    </div>
</div>
