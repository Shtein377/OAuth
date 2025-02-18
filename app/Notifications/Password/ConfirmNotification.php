<?php

namespace App\Notifications\Password;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ConfirmNotification extends Notification implements ShouldQueue
{
    use Queueable;

   
    public function __construct()
    {
        //
    }

    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    
    public function toMail(object $notifiable): MailMessage


    {

            //  $url = route('password.edit', 123);

            $url = app_url('password/123');
           
        return (new MailMessage)
                    ->subject('Изменение пароля')
                    ->greeting('Здравствуйте!')
                    ->line('Для изменения пароля нажмите на кнопку ниже:')
                    ->action('Изменить пароль', $url)
                    ->line('Спасибо что пользуетесь приложением!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
