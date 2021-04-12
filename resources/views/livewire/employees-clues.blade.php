<div>
    @if ($buildingEmployees !== null)
        @foreach ($buildingEmployees as $employee)
            <div class="card">
                <div class="card-header d-flex">
                    <div class="mr-auto">
                        <a class="btn">{{ $employee->name }}</a>
                    </div>
                    <div class="">
                        @foreach ($employee->building->clues as $clue)
                            <button class="btn btn-light" wire:click="displayClue({{ $employee->id }}, '{{ $clue }}')">@lang('suspect.' . $clue)</button>
                        @endforeach
                    </div>

                </div>
                <div class="card-body">
                    @if (isset($displayedClue[$employee->id]))
                        @foreach ($displayedClue[$employee->id] as $clue => $dialog)
                            <div class="player_dialog">{{ $clue }}</div>
                            <div class="employee_dialog">{!! $dialog !!}</div>
                        @endforeach
                    @endif
                </div>
            </div>
        @endforeach
    @endif
</div>
