<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class OrderSuccessNotification extends Notification
{
    use Queueable;

    private $order;
    private $items;

    public function __construct($order, $items)
    {
        $this->order = $order;
        $this->items = $items;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Đặt hàng thành công')
            ->view('email_template.don_hang_thanh_cong', [
                'order' => $this->order,
                'items' => $this->items
            ]);
    }
}