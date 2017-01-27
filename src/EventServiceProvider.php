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

		$e = new DeferdieEvent(new EventModel);
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
