<?php

namespace App\Http\Organization\ServiceProvider;

use App\Http\Organization\Model\Organization;
use App\Http\Organization\Observer\OrganizationObserver;
use App\Http\Organization\Repository\OrganizationInterface;
use App\Http\Organization\Repository\OrganizationRepository;
use Illuminate\Support\ServiceProvider;

class OrganizationServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->bind(
            OrganizationInterface::class,
            OrganizationRepository::class
        );
    }

    public function boot()
    {
        Organization::observe(OrganizationObserver::class);
    }
}
