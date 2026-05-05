<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CustomEmailNotification extends Notification
{
    use Queueable;

    private mixed $formData;

    /**
     * Create a new notification instance.
     */
    public function __construct(mixed $data)
    {
        $this->formData = $data;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->subject('Subject: ' . ($this->formData['subject'] ?? 'Notification'))
                    ->greeting('Hi there')
                    ->line('You receive the new message from langMe.')
                    ->line($this->formData['message'])
                    ->action('Go to langMe', url('/home'))
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
            'subject' => $this->formData['subject'],
            'message' => $this->formData['message'],
            'sent_to' => $this->formData['email'] ?? $notifiable->email,
            //'sender_id' => auth()->id(),
        ];
    }
}
