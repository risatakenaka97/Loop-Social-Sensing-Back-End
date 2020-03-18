<?php

namespace App\Http\User\ServiceProvider;

use App\Http\User\Model\User;
use App\Http\User\Observer\UserObserver;
use App\Http\User\Repository\UserInterface;
use App\Http\User\Repository\UserRepository;
use Illuminate\Support\ServiceProvider;

class UserServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->bind(
            UserInterface::class,
            UserRepository::class
        );
    }

    public function boot()
    {
        User::observe(UserObserver::class);
    }
}
