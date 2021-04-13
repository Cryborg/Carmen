<div>
    @if ($buildingEmployees !== null)
        <div class="text-center p-2 bg-light border border-dark shadow-lg m-2 d-flex align-items-center">
            <span class="mr-auto">
                {{ $buildingEmployees->first()->building->name }}
            </span>
            <span class="mr-3">
                {{ $buildingEmployees->first()->city->country->name }}
            </span>
            <span>
                <div class="shadow flag-icon flag-icon-{{ strtolower($buildingEmployees->first()->city->country->cca2) }}"></div>
            </span>
        </div>

        @foreach ($buildingEmployees as $employee)
            <div class="card">
                <div class="card-header d-flex">
                    <div class="mr-auto">
                        <a class="btn">{{ $employee->name }}</a>
                    </div>
                    <div class="">
                        @foreach ($employee->building->clues as $clue)
                            <button class="btn btn-light"
                                wire:click="displayClue({{ $employee->id }}, '{{ $clue }}')"
                                @if (in_array($clue, $hideCluesButtons[$employee->id] ?? [])) disabled @endif"
                                >@lang('suspect.' . $clue)</button>
                        @endforeach
                    </div>

                </div>
                <div class="card-body">
                    @if (isset($displayedClue[$employee->id]))
                        @foreach ($displayedClue[$employee->id] as $clue => $dialog)
                            @if ($clue !== 'wrong_place')
                                <x-dialog-player :clue="$clue"></x-dialog-player>
                            @endif

                            <x-dialog-employee :dialog="$dialog"></x-dialog-employee>
                        @endforeach
                    @endif
                </div>
            </div>
        @endforeach
    @endif
</div>
