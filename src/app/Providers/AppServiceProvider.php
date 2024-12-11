<?php

namespace App\Providers;

use App\ApiFilter\OrderApiFilter;
use App\ApiFilter\ProductApiFilter;
use App\Http\Controllers\SearchController;
use App\Requests\OrderRequest;
use App\Requests\ProductRequest;
use App\Services\CacheDataProvider;
use App\Services\DataProvider;
use App\Services\DataProviderInterface;
use App\Services\Registry;
use Illuminate\Container\Container;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    private const ENTITY_TO_REQUEST_MAP = [
        'order' => OrderRequest::class,
        'product' => ProductRequest::class
    ];

    public const ENTITY_TO_REQUEST_MAP_REGISTRY = 'entity_to_request_map.registry';
    public const ENTITY_TO_API_FILTER_MAP_REGISTRY = 'entity_to_api_filter_map.registry';
    const ENTITY_TO_API_FILTER_MAP = [
        'product' => ProductApiFilter::class,
        'order' => OrderApiFilter::class,
    ];

    /**
     * @return void
     */
    public function register(): void
    {
        $this->app->singleton(self::ENTITY_TO_REQUEST_MAP_REGISTRY, function (Container $app) {
            $registry = new Registry();

            foreach (self::ENTITY_TO_REQUEST_MAP as $type => $class) {
                $registry->register($type, $app->make($class));
            }

            return $registry;
        });

        $this->app->singleton(self::ENTITY_TO_API_FILTER_MAP_REGISTRY, function (Container $app) {
            $registry = new Registry();

            foreach (self::ENTITY_TO_API_FILTER_MAP as $type => $class) {
                $registry->register($type, $app->make($class));
            }

            return $registry;
        });

        $this->app->singleton(DataProvider::class, function (Container $app) {
            return new DataProvider($app->make(self::ENTITY_TO_API_FILTER_MAP_REGISTRY));
        });

        $this->app->singleton(DataProviderInterface::class, CacheDataProvider::class);

        $this->app->singleton(SearchController::class, function (Container $app) {
            return new SearchController($app->make(self::ENTITY_TO_REQUEST_MAP_REGISTRY));
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
