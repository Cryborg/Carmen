<div>
    <select class="form-control" wire:model="selectedCountry">
        @foreach ($countries as $country)
            <option value="{{ $country->id }}">{{ $country->name }}</option>
        @endforeach
    </select>

    @if ($selectedCountry !== null)
        <div class="border border-dark">
            @foreach ($cities as $city)
                <button class="btn btn-light w-100" wire:click="$emit('selectedCity', {{ $city->id }})">
                    {{ $city->name }}
                </button>
            @endforeach
        </div>
    @endif

{{--    <select class="form-control" wire:model="selectedCity">--}}
{{--        @if ($selectedCountry !== null)--}}
{{--            @foreach ($cities as $city)--}}
{{--                <option value="{{ $city->id }}" @if ($selectedCity == $city->id) selected  @endif>{{ $city->name }}</option>--}}
{{--            @endforeach--}}
{{--        @endif--}}
{{--    </select>--}}

    @if ($selectedCity !== null)
        <div class="border border-dark">
            @foreach ($buildings as $building)
                <button class="btn btn-light w-100">
                    {{ $building->name }}
                </button>
            @endforeach
        </div>
    @endif
</div>
