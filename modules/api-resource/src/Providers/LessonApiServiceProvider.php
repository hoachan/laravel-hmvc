<?php

namespace Modules\LessonApi\Providers;

use Illuminate\Support\ServiceProvider;

use Modules\LessonApi\Services\LessonApiService;
use Modules\LessonApi\Contracts\Factory;

use Modules\LessonApi\Cacheable\TagCacheable;

class LessonApiServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        /**Run console build db */
        if ($this->app->runningInConsole()) {
            $this->registerMigrations();
        }
    }

    /**
     * Register RepostsApi's migration files.
     *
     * @return void
     */
    protected function registerMigrations()
    {
        $this->loadMigrationsFrom(__DIR__.'/../../database/migrations');

        return;
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Factory::class, function ($app) {
            return new LessonApiService($app);
        });

        $this->registerCacheable();
    }

    /**
     * Regist Class using Cache function
     */
    public function registerCacheable(){

        //Tag Eloquent
        $this->app->singleton(TagCacheable::class, function ($app) {
            return new TagCacheable('tags');
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [Factory::class];
    }
}
