<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\File;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to your application's "home" route.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     */
    public function boot(): void
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });

        $this->routes(function () {
            // Web routes
            Route::middleware('web')
                ->group(base_path('routes/web.php'));

            // API routes principales (modularizados)
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));

            // Carga automática de todos los archivos dentro de routes/Api/**/* (opcional)
            collect(File::allFiles(base_path('routes/Api')))
                ->each(function ($file) {
                    Route::middleware('api')
                        ->prefix('api')
                        ->group($file->getPathname());
                });

            // Rutas específicas con prefijos personalizados
            Route::middleware('api')->prefix('api/auth')->group(base_path('routes/Api/Auth/login.php'));
            Route::middleware('api')->prefix('api/users')->group(base_path('routes/Api/Users/users.php'));
            Route::middleware('api')->prefix('api/events')->group(base_path('routes/Api/Events/events.php'));
            Route::middleware('api')->prefix('api/speakers')->group(base_path('routes/Api/Speakers/speakers.php'));
            Route::middleware('api')->prefix('api/locations')->group(base_path('routes/Api/Locations/locations.php'));
            Route::middleware('api')->prefix('api/categories')->group(base_path('routes/Api/Categories/categories.php'));
            Route::middleware('api')->prefix('api/tags')->group(base_path('routes/Api/Tags/tags.php'));
            Route::middleware('api')->prefix('api/jornadas')->group(base_path('routes/Api/Jornadas/jornadas.php'));
            Route::middleware('api')->prefix('api/agendas')->group(base_path('routes/Api/Agendas/agendas.php'));
            Route::middleware('api')->prefix('api/eventspeaker')->group(base_path('routes/Api/EventSpeaker/eventspeaker.php'));
            Route::middleware('api')->prefix('api/jornadaspeaker')->group(base_path('routes/Api/JornadaSpeaker/jornadaspeaker.php'));
            Route::middleware('api')->prefix('api/settings')->group(base_path('routes/Api/Settings/settings.php'));
            Route::middleware('api')->prefix('api/documenttypes')->group(base_path('routes/Api/DocumentTypes/documenttypes.php'));
            Route::middleware('api')->prefix('api/usertypes')->group(base_path('routes/Api/UserTypes/usertypes.php'));
            Route::middleware('api')->prefix('api/genders')->group(base_path('routes/Api/Genders/genders.php'));
            Route::middleware('api')->prefix('api/eventtag')->group(base_path('routes/Api/EventTag/eventtag.php'));
        });
    }
}
