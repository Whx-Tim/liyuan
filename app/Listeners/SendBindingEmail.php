<?php

namespace App\Listeners;

use Mail;
use Cache;
use App\Events\UserBindingEmail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendBindingEmail
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  UserBindingEmail  $event
     * @return void
     */
    public function handle(UserBindingEmail $event)
    {
        $email = $event->email;
        $code = Cache::get("{$event->user_id}codes");

        Mail::send('email.bindingEmailCodes', [
            'title'   => '欢迎来到本站！',
            'code'    => $code,
        ],function($message) use($email){
            $message->to($email)->subject('欢迎绑定邮箱！');
        });
    }
}
