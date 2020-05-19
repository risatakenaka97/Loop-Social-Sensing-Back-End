<?php

use App\Http\Base\Middleware\CorsMiddleware;
use App\Http\Feedback\ServiceProvider\FeedbackServiceProvider;
use App\Http\Organization\ServiceProvider\OrganizationServiceProvider;
use App\Http\User\ServiceProvider\UserServiceProvider;

require_once __DIR__.'/../vendor/autoload.php';

(new Laravel\Lumen\Bootstrap\LoadEnvironmentVariables(
    dirname(__DIR__)
))->bootstrap();

/*
|--------------------------------------------------------------------------
| Create The Application
|--------------------------------------------------------------------------
|
| Here we will load the environment and create the application instance
| that serves as the central piece of this framework. We'll use this
| application as an "IoC" container and router for this framework.
|
*/

$app = new Laravel\Lumen\Application(
    dirname(__DIR__)
);

$app->configure('organization_types');
$app->configure('roles');

 $app->withFacades();

 $app->withEloquent();

/*
|--------------------------------------------------------------------------
| Register Container Bindings
|--------------------------------------------------------------------------
|
| Now we will register a few bindings in the service container. We will
| register the exception handler and the console kernel. You may add
| your own bindings here if you like or you can make another file.
|
*/

$app->singleton(
    Illuminate\Contracts\Debug\ExceptionHandler::class,
    App\Exceptions\Handler::class
);

$app->singleton(
    Illuminate\Contracts\Console\Kernel::class,
    App\Console\Kernel::class
);

/*
|--------------------------------------------------------------------------
| Register Middleware
|--------------------------------------------------------------------------
|
| Next, we will register the middleware with the application. These can
| be global middleware that run before and after each request into a
| route or middleware that'll be assigned to some specific routes.
|
*/

 $app->middleware([
     CorsMiddleware::class
 ]);

 $app->routeMiddleware([
     'auth' => App\Http\Base\Middleware\Authenticate::class,
 ]);

/*
|--------------------------------------------------------------------------
| Register Service Providers
|--------------------------------------------------------------------------
|
| Here we will register all of the application's service providers which
| are used to bind services into the container. Service providers are
| totally optional, so you are not required to uncomment this line.
|
*/

$app->register(App\Providers\AuthServiceProvider::class);
$app->register(Tymon\JWTAuth\Providers\LumenServiceProvider::class);
$app->register(Urameshibr\Providers\FormRequestServiceProvider::class);
$app->register(Waavi\Sanitizer\Laravel\SanitizerServiceProvider::class);
$app->register(UserServiceProvider::class);
$app->register(OrganizationServiceProvider::class);
$app->register(FeedbackServiceProvider::class);

/*
|--------------------------------------------------------------------------
| Load The Application Routes
|--------------------------------------------------------------------------
|
| Next we will include the routes file so that they can all be added to
| the application. This will provide all of the URLs the application
| can respond to, as well as the controllers that may handle them.
|
*/

$app->router->group([
    'namespace' => 'App\Http\User\Controller',
], function ($router) {
    require __DIR__.'/../routes/user/api.php';
});

$app->router->group([
    'namespace' => 'App\Http\Organization\Controller',
], function ($router) {
    require __DIR__.'/../routes/organization/api.php';
});

$app->router->group([
    'namespace' => 'App\Http\Feedback\Controller',
], function ($router) {
    require __DIR__.'/../routes/feedback/api.php';
});

$app->router->group([
    'namespace' => '',
], function ($router) {
    require __DIR__.'/../routes/web.php';
});

return $app;
