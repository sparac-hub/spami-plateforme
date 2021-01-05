<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class ContactPageFormSubmitted extends Notification
{
    use Queueable;

    protected $form_data;

    /**
     * ContactPageFormSubmitted constructor.
     * @param array $form_data
     */
    public function __construct(array $form_data)
    {
        $this->form_data = $form_data;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        if (env('APP_ENV') == 'local') { // Only database on local (we'll not send emails during the installation)
            return ['database'];
        }
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param mixed $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Vous avez reçu un nouveau message sur :' . config('app.name'))
            ->line('Vous avez reçu un nouveau message sur :')
            ->action(config('app.name'), url('/'))
            ->line(trans('og.contact.name') . ' : ' . $this->form_data['name'])
            ->line(trans('og.contact.phone') . ' : ' . $this->form_data['phone'])
            ->line(trans('og.contact.email') . ' : ' . $this->form_data['email'])
            ->line(trans('og.contact.message') . ' : ' . $this->form_data['message']);
    }

    public function toDatabase($notifiable)
    {
        return $this->form_data;
    }

    /**
     * Get the array representation of the notification.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
