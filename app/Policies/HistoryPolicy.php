<?php

namespace App\Policies;

use App\User;
use App\History;
use Illuminate\Auth\Access\HandlesAuthorization;

class HistoryPolicy
{
    use HandlesAuthorization;
    
    /**
     * Determine whether the user can view any histories.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the history.
     *
     * @param  \App\User  $user
     * @param  \App\History  $history
     * @return mixed
     */
    public function view(User $user, History $history)
    {
    }

    /**
     * Determine whether the user can create histories.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return in_array($user->email,[
            'phonenai2014@gmail.com'
        ]);
    }

    /**
     * Determine whether the user can update the history.
     *
     * @param  \App\User  $user
     * @param  \App\History  $history
     * @return mixed
     */
    public function update(User $user, History $history)
    {
        return in_array($user->email,[
            'phonenai2014@gmail.com'
        ]);
    }

    /**
     * Determine whether the user can delete the history.
     *
     * @param  \App\User  $user
     * @param  \App\History  $history
     * @return mixed
     */
    public function delete(User $user, History $history)
    {
        return in_array($user->email,[
            'phonenai2014@gmail.com'
        ]);
    }

    /**
     * Determine whether the user can restore the history.
     *
     * @param  \App\User  $user
     * @param  \App\History  $history
     * @return mixed
     */
    public function restore(User $user, History $history)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the history.
     *
     * @param  \App\User  $user
     * @param  \App\History  $history
     * @return mixed
     */
    public function forceDelete(User $user, History $history)
    {
        //
    }
}
