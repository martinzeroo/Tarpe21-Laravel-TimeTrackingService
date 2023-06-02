<?php

namespace App\Models;

Use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;
    protected $fillable=[
        'person',
        'fullname',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
