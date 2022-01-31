<?php

namespace Fligno\GitlabSdk;

use Fligno\StarterKit\Providers\BaseStarterKitServiceProvider as ServiceProvider;

class GitlabSdkServiceProvider extends ServiceProvider
{
    /**
     * Register any package services.
     *
     * @return void
     */
    public function register(): void
    {
        parent::register();

        $this->mergeConfigFrom(__DIR__.'/../config/gitlab-sdk.php', 'gitlab-sdk');

        // Register the service the package provides.
        $this->app->singleton('gitlab-sdk', function ($app, $params) {
            return new GitlabSdk($params['private_token']);
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides(): array
    {
        return ['gitlab-sdk'];
    }

    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole(): void
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__.'/../config/gitlab-sdk.php' => config_path('gitlab-sdk.php'),
        ], 'gitlab-sdk.config');

        // Publishing the views.
        /*$this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/fligno'),
        ], 'gitlab-sdk.views');*/

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/fligno'),
        ], 'gitlab-sdk.views');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/fligno'),
        ], 'gitlab-sdk.views');*/

        // Registering package commands.
        // $this->commands([]);
    }
}
