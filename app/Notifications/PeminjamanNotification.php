<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Notification as FacadesNotification;

class PeminjamanNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     * @return void
     */
    private $waktu_peminjaman;
    public function __construct($waktu_peminjaman)
    {
        $this->waktu_peminjaman = $waktu_peminjaman;
    }

    /**
     * Get the notification's delivery channels.
     * @param  mixed  $notifiable
     * @return array
     *
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
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
            'peminjaman_id' => $this->waktu_peminjaman->peminjaman_id,
            'user_id' => $this->waktu_peminjaman->pin->user_id,
            'status' => $this->waktu_peminjaman->pin->status,
            'title' => 'Peminjaman Lapangan',
            'messages' => $this->waktu_peminjaman->pin->us->name. ' Melakukan peminjaman lapangan.',
            'url' => route('Bookings.edit', $this->waktu_peminjaman->peminjaman_id),
        ];
    }
}
