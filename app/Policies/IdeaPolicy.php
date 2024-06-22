<?php

namespace App\Policies;

use App\Models\Idea;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class IdeaPolicy
{
    // /**
    //  * Determine whether the user can view any models.
    //  */
    // public function viewAny(User $user): bool
    // {
    //     //! index
    // }

    // /**
    //  * Determine whether the user can view the model.
    //  */
    // public function view(User $user, Idea $idea): bool
    // {
    //     //! show
    // }

    // /**
    //  * Determine whether the user can create models.
    //  */
    // public function create(User $user): bool
    // {
    //     //! create/store
    // }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Idea $idea): bool
    {
        //! edit/update
        return ($user->is_admin || $user->id === $idea->user_id);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Idea $idea): bool
    {
        //! destroy
        return ($user->is_admin || $user->id === $idea->user_id);
    }

    // /**
    //  * Determine whether the user can restore the model.
    //  */
    // public function restore(User $user, Idea $idea): bool
    // {
    //     //
    // }

    // /**
    //  * Determine whether the user can permanently delete the model.
    //  */
    // public function forceDelete(User $user, Idea $idea): bool
    // {
    //     //
    // }
}
