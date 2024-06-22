<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Idea;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        //! if the name of the policy is not ModelNamePolicy it will not be ditected automatically, in this case we should register it here.
        // todo: ModelName::class => PolicyName::class
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        //! defining gates for permision and roles:
        // the bool here is the return type
        //Role
        Gate::define('admin', function (User $user): bool {
            return (bool) $user->is_admin;
        });
        //Role

        //permission
        Gate::define('idea.editDelete', function (User $user, Idea $idea): bool {
            return ((bool) $user->is_admin || $user->id == $idea->user_id);
        });
        //permission
    }
}
