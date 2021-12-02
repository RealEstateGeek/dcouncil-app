<?php

namespace App\Http\Controllers;

use App\Services\NewsletterInterface;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use MailchimpMarketing\ApiException;

class NewsletterController extends Controller
{
    /**
     * @param NewsletterInterface $newsletter
     */
    public function __invoke(NewsletterInterface $newsletter)
    {
        // Validate request payload
        request()->validate(
            [
                'email' => [
                    'required',
                    'email',
                ]
            ]
        );

        try {
            $newsletter->subscribe(request('email'));
        } catch (ApiException $e) {
            throw ValidationException::withMessages(
                [
                    'email' => 'Your email could not be added to our newsletter',
                ]
            );
        }
        return redirect('/posts')
            ->with('registerSuccess', 'You are now signed up for our newsletter!');
    }
}
