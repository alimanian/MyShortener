<?php

namespace App\Notifications;

use App\Notifications\Channels\KavenegarChannel;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class VerifyCode extends Notification
{
    use Queueable;

    public array $data;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($template, $token2 = null, $token3 = null)
    {
        $this->data['template']  = $template;
        $this->data['token2'] = $token2;
        $this->data['token3'] = $token3;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param $notifiable
     * @return array
     */
    public function via($notifiable): array
    {
        return [KavenegarChannel::class];
    }


    public function getData(): array
    {
        foreach ($this->data as $key => $value){
            $this->data[$key] =  str_replace(' ', '‌', $value);
        }
        return $this->data;
    }
}
