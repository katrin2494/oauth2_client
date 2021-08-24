<?php

namespace App\Providers;

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
		self::bootSpotifySocialite();
    }

	private function bootSpotifySocialite()
	{
		$socialite = $this->app->make('Laravel\Socialite\Contracts\Factory');
		$socialite->extend(
			'oauth',
			function ($app) use ($socialite) {
				$config = $app['config']['services.oauth'];
				return $socialite->buildProvider(CustomUserProvider::class, $config);
			}
		);
	}
}
