<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Lang;

class RestablecerContraseña extends Notification
{
    use Queueable;

    public $token;

    /**
     * Create a new notification instance.
     */
    public function __construct($token)
    {
        $this->token = $token;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }
    
    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable)
    {
        return (new MailMessage)
            ->greeting('Soporte de ayuda al Usuario')
            ->subject(Lang::get('Restaurar Contraseña'))
            ->line(Lang::get('Estás recibiendo este correo electrónico porque recibimos una solicitud de restablecimiento de contraseña para tu cuenta.'))
            ->line('Haga clic en el siguiente enlace para restablecer su contraseña')
            ->action(Lang::get('Restaurar Contraseña'), route('password.reset', ['token'=>$this->token]))
            ->line(Lang::get('Este link de restauracion expira en :count minutos.', ['count' => config('auth.passwords.'.config('auth.defaults.passwords').'.expire')]))
            ->line('Si no solicitó un restablecimiento de contraseña, no es necesario realizar ninguna otra acción.')
            ->salutation('Equipo Hotel Boutique Vendimia');
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
