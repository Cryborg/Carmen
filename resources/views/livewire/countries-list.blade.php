<div>
    <select class="form-control" wire:model="selectedCountry">
        @foreach ($countries as $country)
            <option value="{{ $country->id }}">{{ $country->name }}</option>
        @endforeach
    </select>

    <select class="form-control" wire:model="selectedCity">
        @if ($selectedCountry !== null)
            @foreach ($cities as $city)
                <option value="{{ $city->id }}" @if ($selectedCity == $city->id) selected  @endif>{{ $city->name }}</option>
            @endforeach
        @endif
    </select>

    <select class="form-control">
        @if ($selectedCity !== null)
            @foreach ($buildings as $building)
                <option value="{{ $building->id }}">{{ $building->name }}</option>
            @endforeach
        @endif
    </select>
</div>
