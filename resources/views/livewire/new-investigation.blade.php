<div>
    @if ($investigationInProgress)
        <div class="card">
            <div class="card-header">
                @lang('common.investigation.in_progress')
            </div>
            <div class="card-body">
                <a class="btn btn-success" href="/play">@lang('common.investigation.resume')</a>
                <a class="btn btn-danger" wire:click="$emit('closeInvestigation')">@lang('common.investigation.cancel')</a>
            </div>
        </div>
    @else
        <div class="card">
            <div class="card-header">
                @lang('common.investigation.new')
            </div>
            <div class="card-body">
                <button class="btn btn-success" wire:click="newInvestigation">@lang('common.investigation.start')</button>
            </div>
        </div>
    @endif
</div>
