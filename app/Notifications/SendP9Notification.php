<?php

namespace App\Notifications;

use App\Models\P9;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SendP9Notification extends Notification
{
    use Queueable;

    private P9 $p9;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(P9 $p9)
    {

        $this->p9 = $p9;
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
        $p9 = $this->p9;

        return (new MailMessage)
                    ->greeting('Dear Client')
                    ->line('Click on the "download" button below to download excel file')
                    ->action('Download', route('generate_p9_download_p9',['id' => $p9->code]))
                    ->line('Thank you for using our application!');
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
            //
        ];
    }
}
