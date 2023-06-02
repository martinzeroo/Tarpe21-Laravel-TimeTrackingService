<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne

class person extends Model
{
    use HasFactory;

    /**
     * Get the user associated with the person
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function tracking(): HasOne
    {
        return $this->hasOne(Tracking::class);
    }

    /**
     * Get the user associated with the person
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user(): HasOne
    {
        return $this->hasOne(User::class, 'foreign_key', 'local_key');
    }
}
