<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace Tall\Table;

use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

class TallTableServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->commands([\Tall\Table\Commands\CreateCommand::class]);
        }

        $this->publishViews();
        $this->publishConfigs();
        $this->loadTranslationsFrom(__DIR__ . '/../resources/lang', "table");
        
        
        
        include_once __DIR__."/../helpers.php";
        
        Livewire::component( 'table-edit-component', \Tall\Table\Livewire\EditColumn::class);
        Livewire::component( 'table::reports-component', \Tall\Table\Livewire\ReportsComponent::class);
        Livewire::component( 'table::report-component', \Tall\Table\Livewire\ReportComponent::class);
        
    }

    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/table.php','table'
        );
        $this->app->register(RouteServiceProvider::class);
    }
    
    private function publishViews(): void
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'table');

        $this->publishes([
            __DIR__ . '/../resources/views' => resource_path('views/vendor/table'),
        ], 'table-views');
    }

    private function publishConfigs(): void
    {
        $this->publishes([
            __DIR__ . '/../config/table.php' => config_path('table.php'),
        ], 'table-config');

        $this->publishes([
            __DIR__ . '/../resources/lang' => resource_path('lang/vendor/table' ),
        ], 'table-lang');
    }
}
