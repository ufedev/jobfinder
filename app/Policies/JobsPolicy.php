<?php

namespace App\Policies;

use App\Models\Jobs;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class JobsPolicy
{


    public function viewAny(User $user): bool
    {

        return $user->rol === 2;
    }

    public function update(User $user, Jobs $job): bool
    {
        //

        return $user->id === $job->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Jobs $job): bool
    {
        //
        return FALSE;
    }
}
