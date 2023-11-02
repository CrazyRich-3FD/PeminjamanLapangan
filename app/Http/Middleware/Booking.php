<?php

namespace App\Http\Middleware;

use App\Models\Lapangan;
use App\Models\waktuPeminjaman;
use Closure;
use Illuminate\Http\Request;

class Booking
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        return waktuPeminjaman::where([['tgl_awal',$request->tgl_awal]]) && Lapangan::where([['idlapangan',$request->lapangan_id]])
        ->exists() ? redirect('Booking.store'):$next($request);
    }
}
