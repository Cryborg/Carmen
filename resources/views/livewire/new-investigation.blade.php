<div>
    @if ($investigationInProgress)
        <div class="card">
            <div class="card-header">
                @lang('common.investigation.in_progress')
            </div>
            <div class="card-body">
                <a class="btn btn-success" href="/play">@lang('common.investigation.resume')</a>
            </div>
        </div>
    @else
        <div class="card">
            <div class="card-header">
                @lang('common.investigation.new')
            </div>
            <div class="card-body">
                <button wire:click="newInvestigation">@lang('investigation.start')</button>
            </div>
        </div>
    @endif
</div>
