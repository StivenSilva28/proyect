<?php

namespace Illuminate\Foundation\Support\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
<<<<<<< HEAD
     * @var array
=======
     * @var array<class-string, class-string>
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     */
    protected $policies = [];

    /**
     * Register the application's policies.
     *
     * @return void
     */
    public function registerPolicies()
    {
<<<<<<< HEAD
        foreach ($this->policies() as $key => $value) {
            Gate::policy($key, $value);
=======
        foreach ($this->policies() as $model => $policy) {
            Gate::policy($model, $policy);
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
        }
    }

    /**
     * Get the policies defined on the provider.
     *
<<<<<<< HEAD
     * @return array
=======
     * @return array<class-string, class-string>
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     */
    public function policies()
    {
        return $this->policies;
    }
}
