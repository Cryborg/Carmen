<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Picture extends Model
{
    protected $dates = [
        'approved_at' => 'timestamp',
    ];

    protected $fillable = [
        'approved_at',
        'approved_by',
        'filename',
        'imageable_id',
        'imageable_type',
    ];

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
