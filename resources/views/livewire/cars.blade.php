<div>
    <select wire:model.change="year">
        @foreach ($years as $y)
            <option value="{{$y->year}}">{{$y->year}}</option>
        @endforeach

    </select>


    <div class="boxs">

        @forelse ($cars as $car)
            <x-box-car :carInfo="$car" />
        @empty
            <span>loding</span>
        @endforelse

        {{-- <ul class="pagination_ul">

                @for ($i = $cars->currentPage() - 2; $i <= $cars->currentPage() + 2; $i++)
                    @if ($i > 0 && $i <= $cars->lastPage())
                        <li class="@if ($cars->currentPage() == $i) active @endif"><a
                                href="{{ $cars->url($i) }}">{{ $i }}</a></li>
                    @endif
                @endfor

         </ul> --}}





    </div>
    @if ($cars->hasPages())

        <div class="pagination_ul">
            @if ($cars->onFirstPage())
                <button disabled><i class="material-symbols-outlined">chevron_left</i></button>
            @else
                <button wire:click="previousPage" wire:loading.attr="disabled" rel="prev" class="btn_pagination">
                    <i class="material-symbols-outlined">chevron_left</i>
                </button>
            @endif
            <span>{{ $cars->currentPage() }}</span>
            @if ($cars->hasMorePages())
                <button wire:click="nextPage" wire:loading.attr="disabled" rel="next" class="btn_pagination">
                    <i class="material-symbols-outlined">chevron_right</i>
                </button>
            @else
                <button disabled><i class="material-symbols-outlined">chevron_right</i></button>
            @endif

        </div>

    @endif
</div>
