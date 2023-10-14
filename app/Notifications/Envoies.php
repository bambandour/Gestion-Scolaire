<?php

namespace App\Notifications;

use App\Models\Eleve;
use App\Models\Event;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class Envoies extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(protected Event $event, protected string $nomEleve)
    {
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
        return (new MailMessage)
                    ->subject('Rappels d\'evenement')
                    ->greeting("Bonjour,{$this->nomEleve}")
                    ->line("Ceci est un message de rappel d'évènement.")
                    ->line("Titre: {$this->event->nom}")
                    ->line("Description: {$this->event->description}")
                    ->action('Notification Action', url('/'))
                    ->line('Cordialement !');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            "event_id"=>$this->event->id,
            "event_title"=>$this->event->nom
        ];
    }
}
