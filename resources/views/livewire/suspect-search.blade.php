<div>
    <div class="card mh">
        <div class="card-header text-center font-weight-bold">
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
                @endif
            @else
                Bravo !
            @endif
        </div>
        @if (count($suspects) === 1)
            <div class="card-footer text-center">
                <button class="btn btn-primary" wire:click="checkWarrant({{ $suspect->id }})">@lang('suspect.issue_warrant')</button>
            </div>
        @endif
    </div>
</div>
