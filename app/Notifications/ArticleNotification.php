<?php

namespace App\Notifications;

use App\Traits\Firebase;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ArticleNotification extends Notification
{
    use Queueable, Firebase;

    private $data;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = [
            'type'     => 'article_notify',
            'title_ar' => 'تم نشر مقال جديد بواسطة حكيم ويب',
            'title_en' => 'A new article has been published by Hakem Web',
            'body_ar'  => $data['name_ar'],
            'body_en'  => $data['name_en'],
            'model_id' => $data['id'],
        ];
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
        $this->sendFcmNotifications([$notifiable->device_token], $this->data, app()->getLocale());
        return $this->data;
    }
}
