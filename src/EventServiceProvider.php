<?php

/**
 * @author Ferdie De Oliveira <deferdie@gmail.com>
 */

namespace deferdie\Event;

use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\Router;
use deferdie\Event\Model\EventModel;

class EventServiceProvider extends ServiceProvider
{
	public function boot()
	{
		$this->loadMigrationsFrom(__DIR__.'/Migrations');

		$this->setupRoutes($this->app->router);

		$e = new DeferdieEvent(new EventModel);
	}

	/**
	 * Define the routes for the application.
	 *
	 * @param  \Illuminate\Routing\Router  $router
	 * @return void
	 */
	public function setupRoutes(Router $router)
	{
		$router->group(['namespace' => 'deferdie\Event\Http\Controllers'], function($router)
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
