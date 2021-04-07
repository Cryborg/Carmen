<div>
    <select class="form-control" wire:model="selectedCountry">
        @foreach ($countries as $country)
            <option value="{{ $country['cca3'] }}">{{ $country['name']['common'] }}</option>
        @endforeach
    </select>

    <select class="form-control" wire:model="selectedCity">
        @if ($selectedCountry !== null)
            @foreach ($cities as $city)
                <option value="{{ $city->name }}">{{ $city->name }}</option>
            @endforeach
        @endif
    </select>
</div>
