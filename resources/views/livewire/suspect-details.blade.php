<div>
    <div class="row">
        <div class="col-5">@lang('suspect.genre')</div>
        <div class="col">
            <select class="form-control" name="genre" wire:model="genre">
                <option value=""></option>
                @foreach ($genres as $genre)
                    <option value="{{ $genre }}">@lang('suspect.genres.' . $genre)</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-5">@lang('suspect.hair')</div>
        <div class="col">
            <select class="form-control" name="hair" wire:model="hair">
                <option value=""></option>
                @foreach ($hairs as $hair)
                    <option value="{{ $hair }}">@lang('suspect.hairs.' . $hair . '.label')</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-5">@lang('suspect.height')</div>
        <div class="col">
            <select class="form-control" name="height" wire:model="height">
                <option value=""></option>
                @foreach ($heights as $height)
                    <option value="{{ $height }}">@lang('suspect.heights.' . $height)</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-5">@lang('suspect.origin')</div>
        <div class="col">
            <select class="form-control" name="origin" wire:model="origin">
                <option value=""></option>
                @foreach ($origins as $origin)
                    <option value="{{ $origin }}">@lang('suspect.origins.' . $origin . '.label')</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-5">@lang('suspect.hobby')</div>
        <div class="col">
            <select class="form-control" name="hobby" wire:model="hobby">
                <option value=""></option>
                @foreach ($hobbies as $hobby)
                    <option value="{{ $hobby }}">@lang('suspect.hobbies.' . $hobby)</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-5">@lang('suspect.sign')</div>
        <div class="col">
            <select class="form-control" name="sign" wire:model="sign">
                <option value=""></option>
                @foreach ($signs as $sign)
                    <option value="{{ $sign }}">@lang('suspect.signs.' . $sign)</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-5">@lang('suspect.fashion_style')</div>
        <div class="col">
            <select class="form-control" name="fashion_style" wire:model="fashion_style">
                <option value=""></option>
                @foreach ($fashion_styles as $fashion_style)
                    <option value="{{ $fashion_style }}">@lang('suspect.fashion_styles.' . $fashion_style)</option>
                @endforeach
            </select>
        </div>
    </div>
</div>
