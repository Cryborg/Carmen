<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            @lang('common.home')
        </h2>
    </x-slot>

    <div class="row">
        <div class="col-4">
            @livewire('new-investigation')
        </div>
        <div class="col-8">
            @livewire('create-clue')
        </div>
    </div>

</x-app-layout>
