<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use Inertia\Inertia;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function index()
    {
        $today = Carbon::today();

        $totalTransaksi = Transaksi::whereDate('created_at', $today)->count();

        return Inertia::render('Welcome', [
            'totalTransaksi' => $totalTransaksi,
        ]);
    }
}
