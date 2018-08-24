<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\TourPackage;
use App\User;
class TourPackageRegisteredNotification extends Notification
{
    use Queueable;
    public $package,$user;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(TourPackage $package,User $user)
    {
        $this->package = $package;
        $this->user = $user;
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
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
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

    public function toDatabase() {
        return [
            'data'=>$this->user->name
            .' has registered new '.
            $this->package->name
            . 'Tour Package',
            'package_id'=>$this->package->id
        ];
    }
}