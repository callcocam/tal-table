<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace Tall\Table\Providers;

use Illuminate\Support\ServiceProvider;
use Tall\Theme\Providers\ThemeServiceProvider;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;

class TableServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->commands([\Tall\Table\Commands\CreateCommand::class]);
        }

        $this->publishMacros();
        $this->publishViews();
        $this->publishConfigs();
        $this->loadTranslationsFrom(__DIR__ . '/../../resources/lang', "table");
        
        
        
        include_once __DIR__."/../../helpers.php";
            
    }

    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../../config/table.php','table'
        );
        $this->app->register(RouteServiceProvider::class);
    }
    
    private function publishViews(): void
    {
        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'tall');
        if(is_dir(resource_path('views/vendor/tall/table')))
        {
            $pathViews = resource_path('views/vendor/tall/table');
            $this->loadViewsFrom($pathViews, 'tall');
        }
        $this->publishes([
            __DIR__ . '/../../resources/views' => resource_path('views/vendor/table'),
        ], 'table-views');
        
        ThemeServiceProvider::configureDynamicComponent(__DIR__."/../../resources/views/components");
        if(is_dir(resource_path("views/vendor/tall/table/components"))){
            ThemeServiceProvider::configureDynamicComponent(resource_path("views/vendor/tall/table/components"));
        }
    }

    private function publishConfigs(): void
    {
        $this->publishes([
            __DIR__ . '/../../config/table.php' => config_path('table.php'),
        ], 'table-config');

        $this->publishes([
            __DIR__ . '/../../resources/lang' => resource_path('lang/vendor/table' ),
        ], 'table-lang');
    }

    private function publishMacros()
    {
        Component::macro('notify', function ($message) {
            $this->dispatchBrowserEvent('notify', $message);
        });

        Builder::macro('search', function ($field, $string) {
            return $string ? $this->where($field, 'like', '%'.$string.'%') : $this;
        });

        Builder::macro('toCsv', function () {
            $results = $this->get();

            if ($results->count() < 1) return;

            $titles = implode(',', array_keys((array) $results->first()->getAttributes()));

            $values = $results->map(function ($result) {
                return implode(',', collect($result->getAttributes())->map(function ($thing) {
                    return '"'.$thing.'"';
                })->toArray());
            });

            $values->prepend($titles);

            return $values->implode("\n");
        });
    }
}
