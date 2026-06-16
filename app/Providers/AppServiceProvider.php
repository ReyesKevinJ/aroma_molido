<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Contact;
use App\Models\Query;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::define('admin', function ($user) {
            return $user->role === 'admin';
        });
        View::composer('components.layouts.admin', function ($view) {

            // Contamos los status en false de ambas tablas
            $unreadContacts = Contact::where('status', false)->count();
            $unreadQueries = Query::where('status', false)->count();

            $totalUnread = $unreadContacts + $unreadQueries;

            // Pasamos la variable a la vista
            $view->with('unreadMessagesCount', $totalUnread);
        });
    }
}
