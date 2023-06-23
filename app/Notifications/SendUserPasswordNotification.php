<?php

namespace App\Notifications;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;

class SendUserPasswordNotification extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(private readonly User $user,private readonly string $password )
    {
        //
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
    public function toMail(object $notifiable): MailMessage
    {
        $receiverName = $this->user->nom;
        $receiverEmail = $this->user->email;
        return (new MailMessage)
                    ->subject("Identifiant")
                    ->line("Bonjour Mr|Mme $receiverName,")
                    ->line("Vous avez été ajouté à notre application. Voici vos identifiants.")
                    ->line("Email: $receiverEmail")
                    ->line("Mot de passe: $this->password")
                    ->action('Connectez-vous', url('/login'))
                    ->line('Merci d\'utiliser notre appliction!');
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
