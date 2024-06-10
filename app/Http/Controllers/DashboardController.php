<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Kreait\Laravel\Firebase\Facades\Firebase;
use Kreait\Firebase\Factory;
class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $auth, $database;
    protected $parent_table = 'iot_data';
    public function __construct()
    {
        $factory = (new Factory)
        ->withServiceAccount(base_path('firebase_credentials.json'))
        ->withDatabaseUri('https://iot-precision-default-rtdb.asia-southeast1.firebasedatabase.app/');    

        $this->auth = $factory->createAuth();
        $this->database = $factory->createDatabase();
    }
    public function index(Request $request)
    {
        $soil = $this->database->getReference("$this->parent_table/soil_fertility_detection")
        ->getSnapshot()->getValue();
        // get last data
        $moisture = $this->database->getReference("$this->parent_table/soil_moisture_detection")
        ->getSnapshot()->getValue();
        $light = $this->database->getReference("$this->parent_table/light_intensity_detection")
        ->getSnapshot()->getValue();
        $ambient = $this->database->getReference("$this->parent_table/ambient_temperature_humidity")
        ->getSnapshot()->getValue();
        return view('pages.dashboard.index', compact('soil', 'moisture', 'light', 'ambient'));
    }

    public function read()
    {
        $ref = $this->database->getReference("$this->parent_table/soil_fertility_detection")->getSnapshot();
        dump($ref);
        $ref = $this->database->getReference("$this->parent_table/soil_moisture_detection")->getSnapshot();
        dump($ref);
        $ref = $this->database->getReference("$this->parent_table/light_intensity_detection")->getSnapshot();
        dump($ref);
        $ref = $this->database->getReference("$this->parent_table/ambient_temperature_humidity")->getSnapshot();
        dump($ref);

    }

    public function set()
    {
        // before
        $ref = $this->database->getReference($this->parent_table)->getValue();
        dump($ref);
        $data = [
            [
                'value'=> 80,
                'unit'=>'',
                'status'=>'normal'
            ],
            [
                'value'=> 78,
                'unit'=>'',
                'status'=>'abnormal'
            ],
            [
                'value'=> 93,
                'unit'=>'',
                'status'=>'normal'
            ],
            [
                'value'=> 84,
                'unit'=>'',
                'status'=>'normal'
            ],

        ];
        // insert data to firebase
        $this->database->getReference("$this->parent_table/ambient_temperature_humidity")->set($data);

        // after
        $ref = $this->database->getReference($this->parent_table)->getValue();
        dump($ref);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'time_on' => 'required',
            'time_off' => 'required|after:time_on',
            'value' => 'required',
            'status' => 'required',
        ]);
        $data = [
            'time_on'   => $request->time_on,
            'time_off'  => $request->time_off,
            'value'     => $request->value,
            'status'    => $request->status,
            'unit'      => '%',
        ];
        $ref = $this->database->getReference("$this->parent_table/soil_fertility_detection")->push($data);
        return redirect()->route('dashboard');
    }
}

