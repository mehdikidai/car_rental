<div>


    {{-- @dd($cars) --}}



    <div class="filter" id="filter_car" data-page="{{ $cars->currentPage() }}">

        <button wire:click="filter({{ '' }})">all</button>

        @forelse ($companies as $company)
            @if ($company->id === $company_id)
                <button disabled wire:click="filter({{ $company->id }})">{{ $company->name }}</button>
            @else
                <button wire:click="filter({{ $company->id }})">{{ $company->name }}</button>
            @endif

        @empty
        @endforelse


    </div>



    <div class="boxs">

        @forelse ($cars as $car)
            <x-box-car :carInfo="$car" />
        @empty
            <span class="mkin_walo">There is nothing ?</span>
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
                <button wire:click="previousPage" wire:loading.attr="disabled" rel="prev" class="btn_pagination"
                    onclick='window.scrollTo({top: 0,behavior: "smooth"})'>
                    <i class="material-symbols-outlined">chevron_left</i>
                </button>
            @endif
            <span>{{ $cars->currentPage() }}</span>
            @if ($cars->hasMorePages())
                <button wire:click="nextPage" wire:loading.attr="disabled" rel="next" class="btn_pagination"
                    onclick='window.scrollTo({top: 0,behavior: "smooth"})'>
                    <i class="material-symbols-outlined">chevron_right</i>
                </button>
            @else
                <button disabled><i class="material-symbols-outlined">chevron_right</i></button>
            @endif

        </div>
    @else
        <x-space h="60" />
    @endif
</div>
