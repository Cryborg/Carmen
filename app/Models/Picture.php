<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Picture extends Model
{
    public function imageable()
    {
        return $this->morphTo();
    }

    public function getImagePathAttribute()
    {
        $file = Storage::disk('pictures')
            ->url(
                $this->imageable->getPicturePath() . $this->filename
            );
        return $file;
    }
}
