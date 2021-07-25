<?php

namespace App\Policies;

use App\Models\ProductSold;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductSoldPolicy
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
     * @param  \App\Models\ProductSold  $productSold
     * @return mixed
     */
    public function view(User $user, ProductSold $productSold)
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

    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ProductSold  $productSold
     * @return mixed
     */
    public function update(User $user, ProductSold $productSold)
    {
        $type=$user->type==='admin';
        return $productSold->user_id===$type;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ProductSold  $productSold
     * @return mixed
     */
    public function delete(User $user, ProductSold $productSold)
    {
        $type=$user->type==='admin';
        return $productSold->user_id===$type;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ProductSold  $productSold
     * @return mixed
     */
    public function restore(User $user, ProductSold $productSold)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ProductSold  $productSold
     * @return mixed
     */
    public function forceDelete(User $user, ProductSold $productSold)
    {
        //
    }
}
