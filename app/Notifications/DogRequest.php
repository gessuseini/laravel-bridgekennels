<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class DogRequest extends Notification implements ShouldQueue
{
    use Queueable;

    public $dog;
    public $clientData;

    public function __construct($dog, $clientData)
    {
        $this->dog = $dog;
        $this->clientData = $clientData;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('New Dog Request')
            ->greeting('Hello Admin,')
            ->line('A new dog request has been made.')
            ->line('Dog Name: ' . $this->dog->dog_name)
            ->line('Client Name: ' . $this->clientData['client_name'] . ' ' . $this->clientData['client_surname'])
            ->line('Client Email: ' . $this->clientData['client_email'])
            ->line('Client Phone: ' . $this->clientData['client_phone'])
            ->line('Description: ' . $this->clientData['description'])
            ->line('Thank you for using our application!');
    }
}
