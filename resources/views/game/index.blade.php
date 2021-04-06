<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="row">
        <div class="col-9 shadow">

        </div>
        <div class="col-3 shadow">
            <div class="card">
                <div class="card-header text-center font-weight-bold">
                    @lang('suspect.title')
                </div>
                <div class="card-body">
                    @livewire('suspect-details')
                </div>
            </div>

            @livewire('suspect-search')
        </div>
    </div>
</x-app-layout>
