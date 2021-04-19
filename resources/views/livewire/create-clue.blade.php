<div class="p-2">
    <form wire:submit.prevent="createClueSubmit">
        @csrf
        <div class="form-group row">
            <label for="countriesList" class="col-sm-2 col-form-label required">
                @lang('clues.create.country')
            </label>
            <div class="col-sm-10">
                <select class="form-control" id="countriesList" wire:model.defer="country" name="country">
                    @foreach ($countries as $country)
                        <option value="{{ $country->cca2 }}">{{ $country->name }}</option>
                    @endforeach
                </select>
                @error('country')
                    <div class="bg-danger text-white">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="clueName" class="col-sm-2 col-form-label required">
                @lang('clues.create.name')
            </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="clueName" wire:model.defer="name" name="name">
                @error('name')
                    <div class="bg-danger text-white">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="clueLink" class="col-sm-2 col-form-label">
                @lang('clues.create.link')
            </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="clueLink" wire:model.defer="wikipedia_link" name="wikipedia_link">
                @error('wikipedia_link')
                    <div class="bg-danger text-white">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <fieldset class="form-group">
            <legend>
                <div class="required">@lang('clues.create.sentences')</div>
            </legend>
            @foreach ($clues as $key => $value)
                <div class="form-group row align-items-center">
                    <div class="col-sm-10">
                        <input class="form-control" wire:model.defer="clues.{{ $key }}" name="clues[]" value="{{ $clues[$key] }}">
                        @error('clues.' . $key)
                            <div class="bg-danger text-white">{{ $message }}</div>
                        @enderror
                    </div>
                    <label class="col-sm-2 col-form-label">
                        <a class="btn btn-outline-danger" wire:click.defer="removeClue({{ $key }})">Remove</a>
                    </label>
                </div>
            @endforeach
            <div class="form-group row align-items-center">
                <div class="col-sm-10"></div>
                <label class="col-sm-2 col-form-label">
                    <a class="btn btn-outline-primary" wire:click.defer="addClue">Add</a>
                </label>
            </div>
            @error('clues')
                <div class="bg-danger text-white">{{ $message }}</div>
            @enderror
        </fieldset>

        <button class="btn btn-success" type="submit">
            @lang('clues.create.submit')
        </button>
    </form>
</div>
