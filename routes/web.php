<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
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

Route::get('/posts', [PostController::class, 'index'])->name('home');
Route::get('/posts/{post}', [PostController::class, 'view']);
Route::post('/posts/{post:id}/comment', [CommentController::class, 'store']);

Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

Route::post('logout', [SessionController::class, 'logout'])->middleware('auth');
Route::get('login', [SessionController::class, 'login'])->middleware('guest');
Route::post('login', [SessionController::class, 'store'])->middleware('guest');

Route::get('commentTable', [CommentController::class, 'viewTable']);

Route::post(
    '/newsletter',
    function () {
        $mailchimp = new \MailchimpMarketing\ApiClient();

        $mailchimp->setConfig(
            [
                'apiKey' => config('services.mailchimp.key'),
                'server' => 'us20',
            ]
        );

        try {
            $response = $mailchimp->lists->createList(
                [
                    "name" => "A Basic List",
                    "permission_reminder" => "permission_reminder",
                    "email_type_option" => false,
                    "contact" => [
                        "company" => "DC Co",
                        "address1" => "123 Abc St",
                        "city" => "Fort Collins",
                        "state" => "CO",
                        "zip" => "80524",
                        "country" => "US",
                    ],
                    "campaign_defaults" => [
                        "from_name" => "List ",
                        "from_email" => "things@example.com",
                        "subject" => "A List!",
                        "language" => "EN_US",
                    ],
                ]
            );
            ddd($response);
        } catch (MailchimpMarketing\ApiException $e) {
            echo $e->getMessage();
        }
    }
);
