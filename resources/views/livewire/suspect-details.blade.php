<div>
    <div class="row">
        <label for="genre" class="col-5 btn text-right">@lang('suspect.genre')</label>
        <div class="col">
            <select id="genre" class="form-control" name="genre" wire:model="genre">
                <option value=""></option>
                @foreach ($genres as $genre)
                    <option value="{{ $genre }}">@lang('suspect.genres.' . $genre)</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="row">
        <label for="hair" class="col-5 btn text-right">@lang('suspect.hair')</label>
        <div class="col">
            <select id="hair" class="form-control" name="hair" wire:model="hair">
                <option value=""></option>
                @foreach ($hairs as $hair)
                    <option value="{{ $hair }}">@lang('suspect.hairs.' . $hair . '.label')</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="row">
        <label for="height" class="col-5 btn text-right">@lang('suspect.height')</label>
        <div class="col">
            <select id="height" class="form-control" name="height" wire:model="height">
                <option value=""></option>
                @foreach ($heights as $height)
                    <option value="{{ $height }}">@lang('suspect.heights.' . $height)</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="row">
        <label for="origin" class="col-5 btn text-right">@lang('suspect.origin')</label>
        <div class="col">
            <select id="origin" class="form-control" name="origin" wire:model="origin">
                <option value=""></option>
                @foreach ($origins as $origin)
                    <option value="{{ $origin }}">@lang('suspect.origins.' . $origin . '.label')</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="row">
        <label for="hobby" class="col-5 btn text-right">@lang('suspect.hobby')</label>
        <div class="col">
            <select id="hobby" class="form-control" name="hobby" wire:model="hobby">
                <option value=""></option>
                @foreach ($hobbies as $hobby)
                    <option value="{{ $hobby }}">@lang('suspect.hobbies.' . $hobby)</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="row">
        <label for="sign" class="col-5 btn text-right">@lang('suspect.sign')</label>
        <div class="col">
            <select id="sign" class="form-control" name="sign" wire:model="sign">
                <option value=""></option>
                @foreach ($signs as $sign)
                    <option value="{{ $sign }}">@lang('suspect.signs.' . $sign)</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="row">
        <label for="fashion_style" class="col-5 btn text-right">@lang('suspect.fashion_style')</label>
        <div class="col">
            <select id="fashion_style" class="form-control" name="fashion_style" wire:model="fashion_style">
                <option value=""></option>
                @foreach ($fashion_styles as $fashion_style)
                    <option value="{{ $fashion_style }}">@lang('suspect.fashion_styles.' . $fashion_style)</option>
                @endforeach
            </select>
        </div>
    </div>
</div>
