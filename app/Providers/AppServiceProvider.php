<?php

namespace App\Providers;

use App\View\Components\Form\ButtonComponent;
use App\View\Components\Form\FormComponent;
use App\View\Components\Form\InputComponent;
use App\View\Components\Form\SelectComponent;
use App\View\Components\Form\TextComponent;
use App\View\Components\Html\AlertComponent;
use App\View\Components\Html\LinkComponent;
use App\View\Components\NavbarComponent;
use App\View\Components\Project\ProjectListComponent;
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
        Blade::component('navbar-component', NavbarComponent::class);

        // form components
        Blade::component('form.input-component', InputComponent::class);
        Blade::component('form.text-component', TextComponent::class);
        Blade::component('form.select-component', SelectComponent::class);
        Blade::component('form.button-component', ButtonComponent::class);
        Blade::component('form-component', FormComponent::class);

        // html component
        Blade::component('html.link-component', LinkComponent::class);
        Blade::component('html.alert-component', AlertComponent::class);

        // model component
        Blade::component('project.list-component', ProjectListComponent::class);
    }
}
