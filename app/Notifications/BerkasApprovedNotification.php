<?php

namespace App\Notifications;

use App\Models\Administrasi;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class BerkasApprovedNotification extends Notification
{
    use Queueable;

    protected $administrasi;

    public function __construct(Administrasi $administrasi)
    {
        $this->administrasi = $administrasi;
    }

    public function via($notifiable)
    {
        return ['mail']; // Anda dapat menambahkan channel lain jika diperlukan (SMS, database, dll.)
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Berkas Disetujui')
            ->line('Berkas Anda dengan judul "' . $this->administrasi->kategori_adm->nama . '" telah disetujui oleh admin.')
            ->line('Silakan cek status berkas Anda pada sistem.')
            ->action('Lihat Berkas', url('/berkas/' . $this->administrasi->id)); // Sesuaikan dengan halaman di mana mahasiswa dapat melihat berkasnya
    }
}
