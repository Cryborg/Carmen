<div>
    <div class="row">
        <div class="col">@lang('suspect.genre')</div>
        <div class="col">
            <select class="form-control" name="genre" wire:model="genre">
                <option></option>
                @foreach ($genres as $genre)
                    <option value="{{ $genre }}">@lang('suspect.genres.' . $genre)</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col">@lang('suspect.hair')</div>
        <div class="col">
            <select class="form-control" name="hair" wire:model="hair">
                <option></option>
                @foreach ($hairs as $hair)
                    <option value="{{ $hair }}">@lang('suspect.hairs.' . $hair)</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col">@lang('suspect.height')</div>
        <div class="col">
            <select class="form-control" name="height" wire:model="height">
                <option></option>
                @foreach ($heights as $height)
                    <option value="{{ $height }}">@lang('suspect.heights.' . $height)</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col">@lang('suspect.origin')</div>
        <div class="col">
            <select class="form-control" name="origin" wire:model="origin">
                <option></option>
                @foreach ($origins as $origin)
                    <option value="{{ $origin }}">@lang('suspect.origins.' . $origin)</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col">@lang('suspect.hobby')</div>
        <div class="col">
            <select class="form-control" name="hobby" wire:model="hobby">
                <option></option>
                @foreach ($hobbies as $hobby)
                    <option value="{{ $hobby }}">@lang('suspect.hobbies.' . $hobby)</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col">@lang('suspect.sign')</div>
        <div class="col">
            <select class="form-control" name="sign" wire:model="sign">
                <option></option>
                @foreach ($signs as $sign)
                    <option value="{{ $sign }}">@lang('suspect.signs.' . $sign)</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col">@lang('suspect.fashion_style')</div>
        <div class="col">
            <select class="form-control" name="fashion_style" wire:model="fashion_style">
                <option></option>
                @foreach ($fashion_styles as $fashion_style)
                    <option value="{{ $fashion_style }}">@lang('suspect.fashion_styles.' . $fashion_style)</option>
                @endforeach
            </select>
        </div>
    </div>
</div>
