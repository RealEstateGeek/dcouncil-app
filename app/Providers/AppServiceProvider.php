<?php

namespace App\Providers;

use App\Services\MailchimpNewsletter;
use App\Services\NewsletterInterface;
use Illuminate\Support\ServiceProvider;
use MailchimpMarketing\ApiClient;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        app()->bind(
            NewsletterInterface::class,
            function () {
                $apiClient = new ApiClient();
                $apiClient->setConfig(
                    [
                        'apiKey' => config('services.mailchimp.key'),
                        'server' => 'us20',
                    ]
                );
                return new MailchimpNewsletter($apiClient);
            }
        );
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
