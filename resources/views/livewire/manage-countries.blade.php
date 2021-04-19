<div>
    <label for="countriesList">@lang('contribute.countries.list')</label>
    <select class="form-control" id="countriesList" wire:model="selectedCountry">
        <option></option>
        @foreach ($countries as $thisCountry)
            <option value="{{ $thisCountry->id }}">{{ $thisCountry->name }} ({{ $thisCountry->pictures->count() }})</option>
        @endforeach
    </select>

    @if ($country)
        <fieldset class="mt-3 p-3 shadow-lg">
            <legend class="">
                @lang('contribute.pictures.list')
                <span wire:loading="selectedCountry" class="spinner-border spinner-border-lg" role="status" aria-hidden="true"></span>
            </legend>

            <div>
                @foreach ($country->pictures as $picture)
                    <img src="{{ $picture->image_path }}" style="max-height:100px;max-width:100px" class="m-1">
                @endforeach
            </div>

            <div class="mt-2">
                @livewire('upload-picture', [
                    'type' => 'countries',
                    'value' => $country->id,
                ], key('country' . $country->id))
            </div>
        </fieldset>

        <fieldset class="mt-3 p-3 shadow-lg">
            <legend>
                @lang('contribute.cities.list')
                <span wire:loading="selectedCountry" class="spinner-border spinner-border-lg" role="status" aria-hidden="true"></span>
            </legend>
            <div class="row">
                @foreach ($cities as $city)
                    <div class="card col-4">
                        <div class="card-header">
                            {{ $city->name }}
                        </div>
                        <div class="card-body">
                            <div>
                                @foreach ($city->pictures as $picture)
                                    <img src="{{ $picture->image_path }}" style="max-height:100px;max-width:100px" class="m-1">
                                @endforeach
                            </div>

                            <div class="mt-2">
                                @livewire('upload-picture', [
                                    'type' => 'cities',
                                    'value' => $city->id,
                                ], key('city-' . $city->id))
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </fieldset>
    @endif

    <div>Liste des bâtiments + ajout d'un bâtiment</div>
    <div>Ajout d'une photo au bâtiment</div>
    <div>Liste des employés + ajout d'un employé</div>
</div>
