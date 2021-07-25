<?php

namespace App\Policies;

use App\Models\CenterShop;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CenterShopPolicy
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
     * @param  \App\Models\CenterShop  $centerShop
     * @return mixed
     */
    public function view(User $user, CenterShop $centerShop)
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
        return $user->teyp === 'admin';
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\CenterShop  $centerShop
     * @return mixed
     */
    public function update(User $user, CenterShop $centerShop)
    {
        return $centerShop->user_id === $user->auth | auth()->user()->type==='centerShop';

    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\CenterShop  $centerShop
     * @return mixed
     */
    public function delete(User $user, CenterShop $centerShop)
    {
        return $centerShop->user_id === $user->auth | auth()->user()->type==='centerShop';

    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\CenterShop  $centerShop
     * @return mixed
     */
    public function restore(User $user, CenterShop $centerShop)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\CenterShop  $centerShop
     * @return mixed
     */
    public function forceDelete(User $user, CenterShop $centerShop)
    {
        //
    }

    public function status(User $user , CenterShop $centerShop)
    {
        $type=$user->type ==='admin';
        return $centerShop->user_id === $type;
    }
}
