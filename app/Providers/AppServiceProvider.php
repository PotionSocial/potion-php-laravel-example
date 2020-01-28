<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(\GuzzleHttp\ClientInterface::class, function () {
            return new \GuzzleHttp\Client([
                'verify' => !App::environment('local'),
                'base_uri' => env('POTION_API_URL') . '/public-api/v1/',
                'headers' => [
                    "Api-Key" => env('POTION_API_KEY'),
                    "Api-Secret" => env('POTION_API_SECRET'),
                    "Content-Type" => "application/json;charset=UTF-8"
                ]
            ]);
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
