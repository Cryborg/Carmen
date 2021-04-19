<div>
    <div class="row">
        <div class="col-2 bg-white p-2">
            <button class="btn w-100 bg-light mb-2" wire:click="$emit('show', 'showCreateClue')">
                @lang('contribute.create_clue')
            </button>
            <button class="btn w-100 bg-light mb-2" wire:click="$emit('show', 'showManageCountries')">
                @lang('contribute.manage_countries')
            </button>
            <button class="btn w-100">
                <span wire:loading class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
            </button>
        </div>
        <div class="col-8">
            @if ($showCreateClue)
                @livewire('create-clue')
            @endif
            @if ($showManageCountries)
                @livewire('manage-countries')
            @endif
        </div>
    </div>
</div>
