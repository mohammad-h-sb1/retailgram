<?php

namespace App\Policies;

use App\Models\CustomerClub;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CustomerClubPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\CustomerClub  $customerClub
     * @return mixed
     */
    public function view(User $user, CustomerClub $customerClub)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->type ==='admin';
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\CustomerClub  $customerClub
     * @return mixed
     */
    public function update(User $user, CustomerClub $customerClub)
    {
        return $customerClub->user_id==$user->id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\CustomerClub  $customerClub
     * @return mixed
     */
    public function delete(User $user, CustomerClub $customerClub)
    {
        return $customerClub->user_id==$user->id;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\CustomerClub  $customerClub
     * @return mixed
     */
    public function restore(User $user, CustomerClub $customerClub)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\CustomerClub  $customerClub
     * @return mixed
     */
    public function forceDelete(User $user, CustomerClub $customerClub)
    {
        //
    }
}
