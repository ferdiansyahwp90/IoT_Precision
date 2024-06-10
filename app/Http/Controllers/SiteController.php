<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\ProfileCompany;
use App\Models\Sosmed;
use App\Models\SubCategory;
use App\Models\Form;
use App\Models\Answer;
use DB;
use Illuminate\Support\Facades\Http;
use SimpleXMLElement;
use Session;
use DateTime;
use GuzzleHttp\Client;

class   SiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect(route('login'));
    }

    public function auth(){
        $username = 'LHgCXjCutZL8GGp9kG6DkqgUD5Ia';
        $password = 'PUEpzdiQWGjyeVLJqvwmDff2PL4a';
        $send = Http::withBasicAuth($username, $password)->post('https://apimws.bkn.go.id/oauth2/token', [
            'username'      => $username,
            'password'       => $password,
            'grant_type'    => 'client_credentials',
        ]);
        return $send;
    }

    public function loginMws(){
        $username = 'LHgCXjCutZL8GGp9kG6DkqgUD5Ia';
        $password = 'PUEpzdiQWGjyeVLJqvwmDff2PL4a';
        $client = new Client();

        $response = $client->request('POST', 'https://apimws.bkn.go.id/oauth2/token', [
            'auth' => [$username, $password], // Replace 'username' and 'password' with your actual credentials
            'form_params' => [
                'grant_type' => 'client_credentials',
            ],
            'headers' => [
                'Content-Type' => 'application/x-www-form-urlencoded', // Replace with the appropriate content type
            ],
        ]);
        $body = $response->getBody()->getContents();
        return $body;
    }
    public function checktoken(){
        $mws = Session::get('wmstoken');
        $sso = Session::get('ssotoken');
        // check expired
        if ($mws && $sso) {
            $now = date('Y-m-d H:i:s');
            // compare two date
            $dateMWS = $mws->date->format('Y-m-d H:i:s');
            $dateSSO = $sso->date->format('Y-m-d H:i:s');
            if($dateMWS < $now){
                $mws = $this->loginMws();
                $dataMWS = json_decode($mws);
                $dataMWS->date = date_add(date_create($now), date_interval_create_from_date_string($dataMWS->expires_in.' seconds'));
                Session::put('wmstoken', $dataMWS);
            }
            if($dateSSO < $now){
                $sso = $this->loginSSO();
                $dataSSO = json_decode($sso);
                $dataSSO->date = date_add(date_create($now), date_interval_create_from_date_string($dataSSO->expires_in.' seconds'));
                Session::put('ssotoken', $dataSSO);
            }
        }
    }
    public function postSkp(){
        $mws = $this->loginMws();
        $sso = $this->loginSSO();
        $client = new Client();
        if (($mws && $sso)) {
            $now = date('Y-m-d H:i:s');
            $dataMWS = json_decode($mws);
            $dataMWS->date = date_add(date_create($now), date_interval_create_from_date_string($dataMWS->expires_in.' seconds'));
            $dataSSO = json_decode($sso);
            $dataSSO->date = date_add(date_create($now), date_interval_create_from_date_string($dataSSO->expires_in.' seconds'));
            Session::put('wmstoken', $dataMWS);
            Session::put('ssotoken', $dataSSO);
        }
    }

    public function loginSSO(){
        $client = new Client();

        $response = $client->request('POST', 'https://sso-siasn.bkn.go.id/auth/realms/public-siasn/protocol/openid-connect/token', [
            'form_params' => [
                'client_id' => 'kotapasuranws',
                'grant_type' => 'password',
                'username' => '198502172010011015',
                'password' => 'FeRRy85',
            ],
            'headers' => [
                'Content-Type' => 'application/x-www-form-urlencoded', // Replace with the appropriate content type
            ],
        ]);
        $body = $response->getBody()->getContents();
        return $body;
    }


    public function getData(){
        $mws = $this->loginMws();
        $sso = $this->loginSSO();
        $client = new Client();
        if (($mws && $sso)) {
            $dataMWS = json_decode($mws);
            $dataSSO = json_decode($sso);
            $tokenMWS = $dataMWS->access_token;
            $tokenSSO = $dataSSO->access_token;
            $headers = [
                'Auth'          => 'bearer '.$tokenSSO,
                'Authorization' => 'Bearer '.$tokenMWS,
                'accept'        => 'application/json',
            ];
            $response = $client->request('GET', 'https://apimws.bkn.go.id:8243/apisiasn/1.0/pns/data-utama/198502172010011015', [
                'headers' => $headers,
            ]);
            $body = $response->getBody()->getContents();
            echo "<pre>";
            print_r($body);
            echo "</pre>";


        }
    }

    public function checkApi(){
        $send = $this->auth();
        if ($send && $send->successful()) {
            $data = $send->json();
            $token = $data['access_token'];
            $headers = [
                'Authorization' => 'Bearer '.$token,
            ];
            $response = Http::withToken($token)->get( 'https://esb-splpdev.layanan.go.id/services/t/pasuruankota.go.id/dbwilayah/getprov');
            // dd($response, $token);
            $xmlData = $response->getBody();
            // Membuat objek SimpleXMLElement dari data XML dengan opsi LIBXML_NOWARNING
            $xmlObject = new SimpleXMLElement($xmlData, LIBXML_NOWARNING, false);
            // Mengkonversi objek SimpleXMLElement menjadi array asosiatif
            $dataArray = json_decode(json_encode($xmlObject), true);
            // Mengkonversi array menjadi JSON
            $jsonData = ['provincesCollection' => $dataArray];
            // Mengembalikan respons dalam format JSON
            return Response()->json($jsonData);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'question' => 'present|array',
        ]);
        $keyValue = Answer::max('key') + 1;
        DB::transaction(function () use($request, $keyValue){
            foreach ($request->question as $key => $question) {
                $form_id = $key;
                try {
                    Answer::insert(['form_id' => $form_id, 'answer' => $question ?? '-', 'key' => $keyValue, 'created_at' => date('Y-m-d H:i:s')]);
                } catch (\Throwable $th) {
                }
            }
        });
        return redirect(route('form.success'))->with('success', 'Berhasil menambah data!');
    }


    public function success(){
        return view('pages.frontend.success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
