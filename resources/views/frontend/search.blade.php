<x-layout-frontend>
    <x-slot:title>
        page search
    </x-slot:title>



    <x-navbar />
    <x-space h="40" />
    <div style="min-height: calc(100vh - 80px)">
        <x-container>
            <div class="boxs">

                @forelse ($cars as $car)
                    <x-box-car :carInfo="$car" />
                @empty
                    <span class="mkin_walo">There is nothing ?</span>
                @endforelse


            </div>

           

            @if ($cars->hasPages())

                @php

                    $q = [
                        'company_id' => request()->get('company_id'),
                        'start_date' => request()->get('start_date'),
                        'end_date' => request()->get('end_date'),
                    ];

                @endphp

                <ul class="pagination_ul ul_page_search">
                    @for ($i = max(1, $cars->currentPage() - 2); $i <= min($cars->lastPage(), $cars->currentPage() + 2); $i++)
                        <li class="@if ($cars->currentPage() == $i) active @endif">
                            <a href="{{ $cars->appends($q)->url($i) }}">{{ $i }}</a>
                        </li>
                    @endfor
                </ul>

            @else

            <x-space h="80" />

            @endif


        </x-container>
    </div>
    
    <x-footer />
</x-layout-frontend>
