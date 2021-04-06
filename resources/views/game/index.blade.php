<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="row">
        <div class="col-3">
            @livewire('suspect-details')
        </div>
        <div class="col-3">
            @livewire('suspect-search')
        </div>
    </div>
</x-app-layout>
