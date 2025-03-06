<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Str;

use Illuminate\Notifications\Messages\DatabaseMessage;



class AnnonceReserved extends Notification
{
    use Queueable;

    private $reservation ;

    /**
     * Create a new notification instance.
     */
    public function __construct($reservation)
    {
        $this->reservation=$reservation;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'message_owner' => 'Your annonce "' . Str::limit($this->reservation->annonce->title , 22) . '" has been reserved and paid!',
            'message_tourist' => 'You have reserved and paid the annonce "' . Str::limit($this->reservation->annonce->title , 22) . '"',
            'reservation_id' => $this->reservation->id,
            'annonce_id' => $this->reservation->annonce_id,
        ];
    }
}
