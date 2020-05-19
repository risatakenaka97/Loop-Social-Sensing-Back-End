<?php

namespace App\Http\Feedback\ServiceProvider;


use App\Http\Feedback\Model\Feedback;
use App\Http\Feedback\Observer\FeedbackObserver;
use App\Http\Feedback\Repository\FeedbackInterface;
use App\Http\Feedback\Repository\FeedbackRepository;
use Illuminate\Support\ServiceProvider;

class FeedbackServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->bind(
            FeedbackInterface::class,
            FeedbackRepository::class
        );
    }

    public function boot()
    {
        Feedback::observe(FeedbackObserver::class);
    }
}
