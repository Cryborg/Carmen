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
                @if ($buildingEmployees->first()->city->country->pictures->count() > 0)
                    <img src="{{ optional($buildingEmployees->first()->city->country->pictures)->first()->image_path }}"
                        data-toggle="modal" data-target="#showPicture"
                        style="max-height:30px">
                @else
                    <div class="shadow flag-icon flag-icon-{{ strtolower($buildingEmployees->first()->city->country->cca2) }}"></div>
                @endif
            </span>
        </div>

        @foreach ($buildingEmployees as $employee)
            <div class="card">
                <div class="card-header d-flex">
                    <div class="mr-auto">
                        <a class="btn">{{ $employee->name }}</a>
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
                    <div class="media mb-3">
                        <div class="media-body pl-3 bg-light ml-5">
                            <h5 class="mt-0"></h5>
                            <div class="position-relative pb-4 text-right pr-3">
                                <div>
                                    @lang('clues.which_subject')
                                </div>
                                @foreach ($employee->building->clues as $clue)
                                    @if (!in_array($clue, $hideCluesButtons[$employee->id] ?? []))
                                        <button class="btn btn-success"
                                            wire:click="displayClue({{ $employee->id }}, '{{ $clue }}')">
                                            @lang('suspect.' . $clue)
                                        </button>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        <img class="align-self-start rounded-circle mr-3" src="images/avatars/generic-avatar.png" alt="" width="40px">
                    </div>
                </div>
            </div>
        @endforeach
    @else
        <div class="card">
            <div class="card-body">
                {!! trans('common.investigation.start_text') !!}
            </div>
        </div>
    @endif
</div>

@push('modals')
    <div class="modal fade" id="showPicture" tabindex="-1" role="dialog" aria-labelledby="showPictureLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body">
                </div>
            </div>
        </div>
    </div>
@endpush

@push('scripts')
    <script>
        document.addEventListener('livewire:load', function () {
            $('#showPicture').on('show.bs.modal', function (event) {
                let imgSrc = $(event.relatedTarget).attr('src');
                $(this).find('.modal-body').html('<img src="' + imgSrc + '" class="w-100 h-100">');
            });
        });
    </script>
@endpush
