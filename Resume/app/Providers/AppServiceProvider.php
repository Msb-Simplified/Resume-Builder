<?php

namespace App\Providers;

// use App\View\Components\ui\form\inputgroup;

use App\View\Components\ui\a;
use App\View\Components\ui\btn;
use App\View\Components\ui\form\formGroup;
use App\View\Components\ui\form\groupAppend;
use App\View\Components\ui\form\groupPrepend;
use App\View\Components\ui\form\inputField;
use App\View\Components\ui\li;
use App\View\Components\ui\modal\modal;
use App\View\Components\ui\modaltoggle;
use App\View\Components\ui\spinner;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::component('a', a::class);
        Blade::component('btn', btn::class);
        Blade::component('spinner', spinner::class);
        Blade::component('modal', modal::class);
        Blade::component('li', li::class);
        Blade::component('toggleModal', modaltoggle::class);
        Blade::component('formgroup', formGroup::class);
        Blade::component('groupprepend', groupPrepend::class);
        Blade::component('groupappend', groupAppend::class);
        Blade::component('inputField', inputField::class);
    }
}
