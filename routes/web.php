<?php

use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->prefix('admin')->group(function () {
    $path = app_path('Http/Livewire');

        if (!is_dir($path)) {
            return;
        }
        $search="app";
        $ns = "\\App";

        foreach ((new \Symfony\Component\Finder\Finder)->in($path) as $component) {
           
            $componentPath = $component->getRealPath();
            $namespace = \Str::after($componentPath, $search);
            $namespace = \Str::replace(['/', '.php'], ['\\', ''], $namespace);
            $component = $ns . $namespace;
            
            if (class_exists($component)) {
                if (method_exists($component, 'route')) {
                    $comp =  app($component);
                    $comp->route();
                }
            }
        }
});
