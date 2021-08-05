<?php

namespace App\Providers;

use App\Http\Functions;
use App\Models\Permission;
use Carbon\Carbon;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
//        $this->registerPolicies();
//
//        if (Cache::has('permissions') && Functions::isProductionMode()) {
//            $permissions = Cache::get('permissions');
//        } else {
//            $permissions = Permission::all();
//
//            Cache::put('permissions', $permissions, Carbon::now()->endOfDay());
//        }
//
//        foreach ($permissions as $permission) {
//            Gate::define($permission->code, function () use ($permission) {
//                return Auth::user()->hasPermission($permission->code);
//            });
//        }
    }
}
