<?php

namespace App\Models;

Use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;
    protected $fillable=[
        'person',
        'fullname',
        'identification',
    ];

    public function trackings(): HasMany
    {
        return $this->hasMany(Booking::class);
    }
}
