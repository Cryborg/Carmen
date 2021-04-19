<div>
    <div class="border border-dark">
        @foreach ($countries as $country)
            <button class="btn btn-light w-100" wire:click="$emit('selectedCountry', {{ $country->id }})">
                @if ($selectedCountry === $country->cca2)
                    <span class="shadow flag-icon flag-icon-{{ strtolower($country->cca2) }}"></span>
                @endif

                {{ $country->name }}
                @if ($selectedCountry === $country->cca2)
                    <span class="shadow flag-icon flag-icon-{{ strtolower($country->cca2) }}"></span>
                @endif
            </button>
        @endforeach
    </div>

    @if ($selectedCountry !== null)
        <div class="border border-dark">
            @foreach ($cities as $city)
                <button class="btn btn-light w-100" wire:click="$emit('selectedCity', {{ $city->id }})">
                    {{ $city->name }}
                </button>
            @endforeach
        </div>
    @endif

    @if ($selectedCity !== null)
        <div class="border border-dark">
            @foreach ($buildings as $building)
                <button class="btn btn-light w-100" wire:click="$emit('selectedBuilding', {{ $building->pivot->id }})">
                    {{ $building->name }}
                </button>
            @endforeach
        </div>
    @endif
</div>
