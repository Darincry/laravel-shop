<?php

namespace App\Providers;

use App\Faker\FakerImageProvider;
use App\Http\Kernel;
use Carbon\CarbonInterval;
use Faker\Factory;
use Faker\Generator;
use Illuminate\Database\Connection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(Generator::class, function () {
            $faker = Factory::create();
            $faker->addProvider(new FakerImageProvider($faker));
            return $faker;
        });
    }

    public function boot(): void
    {
        Model::shouldBeStrict(!app()->isProduction());

        if (app()->isProduction()) {
            DB::listen(function ($query) {
                if ($query->time() > 100) {
                    logger()
                        ->channel('telegram')
                        ->debug('query longer than 1ms:' . $query->sql, $query->bindings);
                }
            });
        }

        app(Kernel::class)->whenRequestLifecycleIsLongerThan(
            CarbonInterval::seconds(4),
            function () {
                logger()
                    ->channel('telegram')
                    ->debug('whenRequestLifecycleIsLongerThan:' . request()->url());
            }
        );
    }
}
