<?php

namespace App\Console\Commands;

use App\Models\Peminjaman;
use App\Models\waktuPeminjaman;
use Illuminate\Console\Command;

class BookingCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'booking:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Log::info("Cron job Berhasil di jalankan " . date('Y-m-d H:i:s'));
        Peminjaman::query()
                    ->join('waktu_peminjaman', 'waktu_peminjaman.peminjaman_id', '=', 'peminjaman.idpinjam')
                    ->where('waktu_peminjaman.tgl_akhir', '<', date('Y-m-d'))
                    ->update(['peminjaman.status' => 'selesai']);
    }
}
