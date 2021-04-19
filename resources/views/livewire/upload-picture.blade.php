<div>
    <form wire:submit.prevent="save">
        <div class="mb-2">
            <input type="hidden" name="type" value="{{ $type }}">
            <input type="hidden" name="value" value="{{ $value }}">
            <input type="file" wire:model="picture" wire:click="">
        </div>

        @error('picture')
            <div class="bg-danger p-2 text-white mb-2">{{ $message }}</div>
        @enderror

        <div class="mb-2">
            {{-- Button "Upload in progress" --}}
            <button class="btn btn-primary" type="button" disabled wire:loading wire:target="picture">
                <span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>
                <span>Uploading...</span>
            </button>

            {{-- Button to actually upload the file --}}
            <button class="btn btn-primary" type="submit" wire:loading.remove wire:target="picture">
                @lang('contribute.pictures.add')
            </button>
        </div>
    </form>
</div>
