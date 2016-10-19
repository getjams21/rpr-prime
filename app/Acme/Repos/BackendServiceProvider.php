<?php namespace Acme\Repos;

use Illuminate\Support\ServiceProvider;

class BackendServiceProvider extends ServiceProvider{

	public function register(){
		#Users
		$this->app->bind('Acme\Repos\User\UserRepository','Acme\Repos\User\DbUserRepository');
	}
}