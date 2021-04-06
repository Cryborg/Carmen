<div>
    <div class="card mh">
        <div class="card-header">
            @lang('suspect.list_header', ['count' => count($suspects)])
        </div>
        <div class="card-body p-1">
            @if (!$caseClosed)
                @if (count($suspects) >= 15)
                    @lang('suspect.too_many_results')
                @else
                    <ul class="list-group list-group-flush">
                        @foreach ($suspects as $suspect)
                            <a href="#" class="list-group-item list-group-item-action" data-suspect="{{ $suspect->id }}">
                                {{ $suspect->name }}
                            </a>
                        @endforeach
                    </ul>
                    @if (count($suspects) === 1)
                        <button class="btn btn-primary" wire:click="checkWarrant({{ $suspect->id }})">@lang('suspect.issue_warrant')</button>
                    @endif
                @endif
            @else
                Bravo !
            @endif
        </div>
        <div class="card-footer">

        </div>
    </div>
</div>
