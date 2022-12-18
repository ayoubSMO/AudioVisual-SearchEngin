<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class voiceSimularController extends Controller
{
    public function index()
    {
        return view('SearchEngin.imageSearch');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $client = new Client();
        $result = $request->input('speechToText');

        $url = "http://127.0.0.1:5000/simul";
        $client = new Client();
        
        $response = $client->request('POST', $url, [
            'form_params' => [
                'message' => 'test',
                'data' => $result,
            ]
        ]);
        return view('SearchEngin.imageFetshing')->with('response' ,$response->getBody());
    }
}
