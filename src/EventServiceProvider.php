<?php

/**
 * @author Ferdie De Oliveira <deferdie@gmail.com>
 */

namespace deferdie\Events;

use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\Router;
use \App\Event;

class EventServiceProvider extends ServiceProvider
{
	public function boot()
	{
		$this->loadRoutesFrom(__DIR__.'/Http/routes.php');

		$this->loadViewsFrom(realpath(__DIR__.'/../views'), 'Events');

		$this->loadMigrationsFrom(__DIR__.'/Migrations');

		$this->setupRoutes($this->app->router);

		$e = new DeferdieEvent(new Event);
	}

	/**
	 * Define the routes for the application.
	 *
	 * @param  \Illuminate\Routing\Router  $router
	 * @return void
	 */
	public function setupRoutes(Router $router)
	{
		$router->group(['namespace' => 'deferdie\Events\Http\Controllers'], function($router)
		{
			require __DIR__.'/Http/routes.php';
		});
	}

	public function register()
	{
		$this->registerContact();
	}

	private function registerContact()
	{
		$this->app->bind('Event',function($app){
			return new Event($app);
		});
	}
}