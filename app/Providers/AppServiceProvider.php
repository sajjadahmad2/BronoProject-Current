<?php

namespace App\Providers;

use App\Core\KTBootstrap;
use Illuminate\Database\Schema\Builder;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Update defaultStringLength
        Builder::defaultStringLength(191);

        KTBootstrap::init();
        \Blade::directive('canany', function ($permissions) {
            return "<?php if(auth()->check() && auth()->user()->permissions->pluck('name')->intersect(explode(',', $permissions))->isNotEmpty()): ?>";
        });

        \Blade::directive('endcanany', function () {
            return "<?php endif; ?>";
        });

    }

}

