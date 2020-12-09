<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Auth\Notifications\VerifyEmail as VerifyEmailNotification;
use Illuminate\Support\Facades\Lang;

class VerifyEmail extends VerifyEmailNotification
{
    
    public function toMail($notifiable)
    {
        $verificationUrl = $this->verificationUrl($notifiable);

        return (new MailMessage)
        ->subject(Lang::get('Confirme su dirección de correo electrónico'))
        ->line(Lang::get('Haga clic en el botón de abajo para verificar su dirección de correo electrónico.'))
        ->action(Lang::get('Confirme su dirección de correo electrónico'), $verificationUrl)
        ->line(Lang::get('Si no creó una cuenta, no es necesario realizar ninguna otra acción.'));
    }

}
