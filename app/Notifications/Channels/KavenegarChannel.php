<?php

namespace App\Notifications\Channels;

use Exception;
use Illuminate\Notifications\Notification;
use Kavenegar;

class KavenegarChannel
{
    /**
     * @throws Exception
     */
    public function send($notifiable, Notification $notification)
    {
        if(! method_exists($notification, 'getData')){
            throw new Exception('getData Method Not Found!');
        }

        $data = $notification->getData();

        if(env('APP_SEND_SMS'))
            Kavenegar::VerifyLookup($notifiable->phone_number, $notifiable->verify_code, $data['token2'], $data['token3'], $data['template']);
    }
}
