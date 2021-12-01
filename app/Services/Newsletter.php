<?php

namespace App\Services;

class Newsletter
{
    /**
     * Add an email to a existing list
     *
     * @param string $email Email address
     */
    public function subscribe(string $email)
    {
        /**
         * @var ApiClient $mailchimp mailchip ApiClient
         */
        $mailchimp = new \MailchimpMarketing\ApiClient();

        $mailchimp->setConfig(
            [
                'apiKey' => config('services.mailchimp.key'),
                'server' => 'us20',
            ]
        );

        $response = $mailchimp->lists->getAll();
        ddd($response);
    }
}
