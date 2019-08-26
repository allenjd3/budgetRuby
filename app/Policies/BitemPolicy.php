<?php

namespace App\Policies;

use App\User;
use App\Bitem;
use Illuminate\Auth\Access\HandlesAuthorization;

class BitemPolicy
{
    use HandlesAuthorization;
    
    /**
     * Determine whether the user can view any bitems.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
		return true;
    }

    /**
     * Determine whether the user can view the bitem.
     *
     * @param  \App\User  $user
     * @param  \App\Bitem  $bitem
     * @return mixed
     */
    public function view(User $user, Bitem $bitem)
    {
       	return $user->id === $bitem->user_id; 
    }

    /**
     * Determine whether the user can create bitems.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
		return true;
    }

    /**
     * Determine whether the user can update the bitem.
     *
     * @param  \App\User  $user
     * @param  \App\Bitem  $bitem
     * @return mixed
     */
    public function update(User $user, Bitem $bitem)
    {
        //
       	return $user->id === $bitem->user_id; 
    }

    /**
     * Determine whether the user can delete the bitem.
     *
     * @param  \App\User  $user
     * @param  \App\Bitem  $bitem
     * @return mixed
     */
    public function delete(User $user, Bitem $bitem)
    {
        //
       	return $user->id === $bitem->user_id; 
    }

    /**
     * Determine whether the user can restore the bitem.
     *
     * @param  \App\User  $user
     * @param  \App\Bitem  $bitem
     * @return mixed
     */
    public function restore(User $user, Bitem $bitem)
    {
        //
       	return $user->id === $bitem->user_id; 
    }

    /**
     * Determine whether the user can permanently delete the bitem.
     *
     * @param  \App\User  $user
     * @param  \App\Bitem  $bitem
     * @return mixed
     */
    public function forceDelete(User $user, Bitem $bitem)
    {
        //
       	return $user->id === $bitem->user_id; 
    }
}
