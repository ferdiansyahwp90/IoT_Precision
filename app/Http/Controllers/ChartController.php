<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HumidityAir;
use App\Models\HumiditySoil;
use App\Models\Npk;
use App\Models\Temperature;
use Carbon\Carbon;

class ChartController extends Controller
{
    public function index()
    {
        // Data dummy untuk contoh
        $now = "2024-05-30";
        $humidity_air = HumidityAir::whereDate('created_at', $now)
            ->orderBy('created_at', 'desc')
            ->limit(3)
            ->get();

        $labels = $humidity_air->pluck('created_at')->map(function($date) {
            return $date->format('H:i');
        });

        $data = $humidity_air->pluck('humidity');

        return view('chart', compact('labels','data'));
    }
}
