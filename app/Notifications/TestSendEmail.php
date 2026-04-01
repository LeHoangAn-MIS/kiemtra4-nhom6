<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class TestSendEmail extends Notification
{
    use Queueable;

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Test gửi email')
            ->line('Đây là email test gửi từ Laravel.')
            ->line('Nếu bạn nhận được email này, cấu hình mail đã thành công.');
    }
}