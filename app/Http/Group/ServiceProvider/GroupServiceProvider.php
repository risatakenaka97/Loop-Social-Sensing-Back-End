<?php

namespace App\Http\Group\ServiceProvider;

use App\Http\Group\Model\Group;
use App\Http\Group\Observer\GroupObserver;
use App\Http\Group\Repository\GroupInterface;
use App\Http\Group\Repository\GroupRepository;
use Illuminate\Support\ServiceProvider;

class GroupServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->bind(
            GroupInterface::class,
            GroupRepository::class
        );
    }

    public function boot()
    {
        Group::observe(GroupObserver::class);
    }
}
