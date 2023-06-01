<?php

namespace App\Policies;

use App\Models\Tracking;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class TrackingPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Tracking $tracking): bool
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Tracking $tracking): bool
    {
        return $tracking->user;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Tracking $tracking): bool
    {
        return $this->update($user, $tracking);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Tracking $tracking): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Tracking $tracking): bool
    {
        //
    }
}
