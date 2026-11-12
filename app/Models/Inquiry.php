<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Inquiry extends Model
{
    protected $fillable = [
        'property_id',
        'name',
        'email',
        'phone',
        'inquiry_type',
        'subject',
        'message',
        'status',
        'admin_notes',
    ];

    public function property(): BelongsTo
    {
        return $this->belongsTo(Property::class);
    }
}

