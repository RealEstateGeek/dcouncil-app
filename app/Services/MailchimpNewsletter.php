<?php

namespace App\Services;

use MailchimpMarketing\ApiClient;

class MailchimpNewsletter implements NewsletterInterface
{
    private ApiClient $apiClient;

    private $listId = '9d3c426f07';

    /**
     * @param ApiClient $apiClient mailchimp's client class
     */
    public function __construct(ApiClient $apiClient)
    {
        $this->apiClient = $apiClient;
    }

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

        return $mailchimp->lists->addListMember(
            $this->listId,
            [
                'email_address' => $email,
                'status' => 'subscribed',
            ]
        );
    }
}
