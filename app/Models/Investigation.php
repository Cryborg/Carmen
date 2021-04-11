<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Investigation extends Model
{
    use HasFactory,
        SoftDeletes;

    public const DELETED_AT = 'case_closed_at';

    protected $fillable = [
        'suspect_id'
    ];

    public function conversations(): HasMany
    {
        return $this->hasMany(Conversation::class);
    }

    public function suspect(): BelongsTo
    {
        return $this->belongsTo(Suspect::class);
    }
}
