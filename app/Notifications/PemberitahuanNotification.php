<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Queue\SerializesModels;

class PemberitahuanNotification extends Notification implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * Create a new notification instance.
     */
    private $waktu_peminjaman;
    public function __construct($waktu_peminjaman)
    {
        $this->afterCommit();
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
            'idpinjam' => $this->waktu_peminjaman->peminjaman_id,
            'status' => $this->waktu_peminjaman->pin->status,
            'title' => 'Peminjaman ' . $this->waktu_peminjaman->pin->lap->nama .' Dengan ID PMJ' . $this->waktu_peminjaman->peminjaman_id,
            'messages' => 'Peminjaman ' . $this->waktu_peminjaman->pin->lap->nama .' Telah ' . $this->waktu_peminjaman->pin->status,
            'disetujui' =>', Silahkan Cetak Invoice.',
            'tolak' => ', Silahkan Cek Jadwal Peminjaman Dan Melakukan Peminjaman Kembali.',
            'selesai' => ', Terima Kasih Dan Jangan Lupa Beri Ulasan.',
            'urls' => route('home.riwayat', $this->waktu_peminjaman->peminjaman_id),
        ];
    }
}
