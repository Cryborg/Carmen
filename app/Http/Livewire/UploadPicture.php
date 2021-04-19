<?php

namespace App\Http\Livewire;

use App\Models\City;
use App\Models\Country;
use App\Models\Picture;
use Livewire\Component;
use Livewire\WithFileUploads;

class UploadPicture extends Component
{
    use WithFileUploads;

    protected $listeners = [
        'refreshComponent',
    ];

    public $picture;
    public string $type;
    public int $value;

    public function mount($type, $value)
    {
        $this->type = $type;
        $this->value = $value;
    }

    public function refreshComponent($type, $value)
    {
        $this->type = $type;
        $this->value = $value;
    }

    public function updatedPicture()
    {
        $this->validate([
            'picture' => 'image|max:1024', // 1MB Max
        ]);
    }

    /**
     * Remove form error messages
     */
    public function hydrate()
    {
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function save()
    {
        $validated = $this->validate([
            'picture' => 'image|max:1024', // 1MB Max
            'type'    => 'required|in:countries,cities',
            'value'   => 'required|integer',
        ]);

        $model = null;
        $subFolder = '';

        switch ($validated['type']) {
            case 'countries':
                $model = Country::find($validated['value']);
                $subFolder = $model->cca2;
                break;
            case 'cities':
                $model = City::find($validated['value']);
                $subFolder = $model->id;
                break;
        }

        $extension = $validated['picture']->extension();
        $folder = $validated['type'] . DIRECTORY_SEPARATOR . $subFolder;
        $filename = uniqid('', true) . '.' . $extension;
        $success = $this->picture->storePubliclyAs($folder, $filename, 'pictures');

        if ($success === false) {
            return false;
        }

        $newPicture = new Picture([
            'filename' => $filename,
        ]);
        $model->pictures()->save($newPicture);

        $this->emitTo('manage-countries', '$refresh');
    }
}
