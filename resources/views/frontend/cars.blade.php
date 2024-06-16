<x-layout-frontend>
    <x-slot:title>
        page car
    </x-slot:title>

    <x-navbar />
    <x-space h="40" />
    <div style="min-height: calc(100vh - 80px)">
        <x-container>

            @livewire('cars')

        </x-container>

    </div>
    <x-footer />


</x-layout-frontend>
