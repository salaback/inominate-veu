<?php

namespace App\Notifications;

use App\Nomination;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class BeenNominated extends Notification
{
    use Queueable;
    private $nomination;
    private $url;

    /**
     * Create a new notification instance.
     *
     * @param Nomination $nomination
     */
    public function __construct(Nomination $nomination)
    {
        $this->nomination = $nomination;
        $this->url =  url('/app/nominations/' . $this->nomination->id);

    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {

        return (new MailMessage)
                    ->line('You have been nominated for ' . title_case($this->nomination->office))
                    ->action('See your nomination!', $this->url)
                    ->line('Congratulations and good luck!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'type' => 'newNomination',
            'message' => 'You have been nominated for ' . title_case($this->nomination->office),
            'url' => $this->url
        ];
    }
}
