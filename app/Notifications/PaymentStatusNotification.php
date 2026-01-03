<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class PaymentStatusNotification extends Notification
{
    use Queueable;

    public function __construct(
        public string $status
    ) {}

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Status Pembayaran SPMB')
            ->greeting('Halo ' . $notifiable->nama_lengkap)
            ->line(
                $this->status === 'approved'
                    ? 'Pembayaran Anda telah DISUTUJUI.'
                    : 'Pembayaran Anda DITOLAK.'
            )
            ->line('Silakan login kembali untuk informasi selanjutnya.')
            ->salutation('SMA Pertiwi Medan');
    }
}
