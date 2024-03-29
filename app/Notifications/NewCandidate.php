<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewCandidate extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(
        public $job_id,
        public $job_title,
        public $candidate_id
    ) {
        //
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
        $url = url('/notifications');
        return (new MailMessage)
            ->line('Hay un nuevo candidato al puesto ' . $this->job_title)
            ->action('Ver Notificación', $url)
            ->line('Gracias por usar JobFinder');
    }


    public function toDatabase(object $notifiable): array
    {
        return [
            'job_id' => $this->job_id,
            'job_title' => $this->job_title,
            "candidate_id" => $this->candidate_id
        ];
    }

    // /**
    //  * Get the array representation of the notification.
    //  *
    //  * @return array<string, mixed>
    //  */
    // public function toArray(object $notifiable): array
    // {
    //     return [
    //         //
    //     ];
    // }
}
