<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Carbon\Carbon;

class RepliedToThread extends Notification
{
    use Queueable;
    protected $requestNewbook;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($requestNewbook)
    {
        //
        // $user->notify(new InvoicePaid($invoice));
        $this->requestNewbook=$requestNewbook;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    { 
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    
    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'user'=>auth()->user(),
            'requestNewbook' => $this->requestNewbook,
           
        ];
    }
}
