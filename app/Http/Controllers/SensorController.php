<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\HumidityAir;
use App\Models\HumiditySoil;
use App\Models\Npk;
use App\Models\Temperature;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SensorController extends Controller
{

    public function index(){
        $now = Carbon::now()->format('Y-m-d');
        // $now = "2024-05-30";
        
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
        $chartNpk = Npk::whereDate('created_at', $now)
            ->orderBy('created_at', 'desc')
            ->limit(3)
            ->get()
            ->groupBy('category');

        $npk_chart_label = [];
        $npk_chart_data = [];
        foreach ($chartNpk as $key => $value) {
            $npk_chart_label[] = $key;
            $npk_chart_data[] = $value->average('value');
        }


        $humidity_soil_chart_label = [];
        $humidity_soil_chart_data = [];
        foreach ($humidity_soil as $key => $value) {
            $humidity_soil_chart_label[] = $value->created_at->format('H:i');
            $humidity_soil_chart_data[] = $value->value;
        }


        $humidity_air_chart_label = [];
        $humidity_air_chart_data = [];
        foreach ($humidity_air as $key => $value) {
            $humidity_air_chart_label[] = $value->created_at->format('H:i');
            $humidity_air_chart_data[] = $value->value;
        }

        $temperature_chart_label = [];
        $temperature_chart_data = [];
        foreach ($temperature as $key => $value) {
            $temperature_chart_label[] = $value->created_at->format('H:i');
            $temperature_chart_data[] = $value->value;
        }
        
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

        $chart = [
            'npk' => [
                'label' => json_encode($npk_chart_label),
                'data' => json_encode($npk_chart_data)
            ],
            'humidity_soil' => [
                'label' => json_encode($humidity_soil_chart_label),
                'data' => json_encode($humidity_soil_chart_data)
            ],
            'humidity_air' => [
                'label' => json_encode($humidity_air_chart_label),
                'data' => json_encode($humidity_air_chart_data)
            ],
            'temperature' => [
                'label' => json_encode($temperature_chart_label),
                'data' => json_encode($temperature_chart_data)
            ]
        ];
        
        return view('pages.dashboard.index', compact('data', 'chart'));
    }

    public function publishSensorData()
    {
        // Ambil data sensor dari request
        $humiditySoilFirst = HumiditySoil::orderBy('created_at', 'DESC')->first();

        // dd($humiditySoilFirst);

        // Logika untuk mengatur pompa berdasarkan nilai kelembapan tanah
        if ($humiditySoilFirst->value < 30) {
            // $this->mqttService->publish('pump/control', 'off');
            return response()->json([
                'status' => 'success', 
                'message' => 'on',
                'data' => $humiditySoilFirst
            ], Response::HTTP_OK);
        } else {
            // $this->mqttService->publish('pump/control', 'on');
            return response()->json([
                'status' => 'success', 
                'message' => 'off',
                'data' => $humiditySoilFirst
            ], Response::HTTP_ACCEPTED);
        }
    }
}
