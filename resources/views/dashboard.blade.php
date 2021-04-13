<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            @lang('common.home')
        </h2>
    </x-slot>

    @if (Auth::user()->investigation)
        <a href="/play">@lang('investigation.in_progress')</a>
    @else
        @livewire('new-investigation')
    @endif
</x-app-layout>
