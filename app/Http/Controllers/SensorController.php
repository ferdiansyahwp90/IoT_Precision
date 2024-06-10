<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\HumidityAir;
use App\Models\HumiditySoil;
use App\Models\Npk;
use App\Models\Temperature;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SensorController extends Controller
{
    public function index(){
        // $now = Carbon::now()->format('Y-m-d');
        $now = "2024-05-30";
        
        // Mengambil 3 data terbaru dalam urutan menurun
        $humidity_air = HumidityAir::whereDate('created_at', $now)
            ->orderBy('created_at', 'desc')
            ->limit(3)
            ->get();
        
        $temperature = Temperature::whereDate('created_at', $now)
            ->orderBy('created_at', 'desc')
            ->limit(3)
            ->get();
        
        $humidity_soil = HumiditySoil::whereDate('created_at', $now)
            ->orderBy('created_at', 'desc')
            ->limit(3)
            ->get();
        
        $npk = Npk::whereDate('created_at', $now)
            ->orderBy('created_at', 'desc')
            ->limit(3)
            ->get();
        
        // Mengambil data pertama berdasarkan tanggal hari ini
        $humidity_air_first = HumidityAir::whereDate('created_at', $now)
        ->orderBy('created_at', 'desc')
        ->first();

        $temperature_first = Temperature::whereDate('created_at', $now)
        ->orderBy('created_at', 'desc')
        ->first();

        $humidity_soil_first = HumiditySoil::whereDate('created_at', $now)
        ->orderBy('created_at', 'desc')
        ->first();
        
        // Mengambil data npk berdasarkan kategori dan tanggal hari ini
        $nitrogen = Npk::whereDate('created_at', $now)
            ->where('category','nitrogen')
            ->orderBy('created_at', 'desc')
            ->first();
        
        $phosphorous = Npk::whereDate('created_at', $now)
            ->where('category','phosphorous')
            ->orderBy('created_at', 'desc')
            ->first();
        
        $potassium = Npk::whereDate('created_at', $now)
            ->where('category','potassium')
            ->orderBy('created_at', 'desc')
            ->first();
        
        $data = [
            'humidity_air'=>$humidity_air,
            'temperature' =>$temperature,
            'humidity_soil'=>$humidity_soil,
            'npk'=>$npk,
            'humidity_air_first'=>$humidity_air_first,
            'temperature_first' =>$temperature_first,
            'humidity_soil_first'=>$humidity_soil_first,
            'nitrogen'=>$nitrogen,
            'phosphorous'=>$phosphorous,
            'potassium'=>$potassium,
        ];
        
        return view('pages.dashboard.index', compact('data'));
    }
}
