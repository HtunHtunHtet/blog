<?php

namespace App\Providers;

use App\Models\User;
use App\Services\MailChampNewsletter;
use App\Services\NewsLetter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use MailchimpMarketing\ApiClient;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        app()->bind(NewsLetter::class, function () {
            $client = (new ApiClient())->setConfig([
                'apiKey' => config('services.mailchimp.key'),
                'server' => 'us13',
            ]);

            return new MailChampNewsletter($client);
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //Paginator::useTailwind();

        Model::unguard();

        Gate::define('admin', function (User $user) {
            return $user->username === 'Ryanhhh91';
        });

        Blade::if('admin', function () {
            return request()->user()?->can('admin');
        });

    }
}
