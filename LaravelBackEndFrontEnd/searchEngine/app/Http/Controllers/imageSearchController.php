<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;


class imageSearchController extends Controller
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
        #dd($client);
        $input = $request->file('image');
        #dd($input);
        /*$fileName = $input->getClientOriginalName() ;
        $destinationPath = 'C:\Users\yoga\Desktop\IAAD\IAAD_S3\M_2_DEEP_LEARNING\LaravelBackEndFrontEnd\searchEngine\public\image\\';
        $modifyDestinationPath = substr_replace($destinationPath ,"", -1);
        $input->move($modifyDestinationPath,$fileName);*/
        /*$result = $client->post('http://127.0.0.1:5000/upload', [
            'form_params' => [
            'form-data' => [
                'body' => [
                    'key' => 'image',
                    'value ' => $input
                ]
            ]]
        ]);
        dd($result);*/


        #############################

        $url = "http://127.0.0.1:5000/upload";
        $client = new Client();
        
        $response = $client->request('POST', $url, [
            'multipart' => [
                [
                    'name'     => 'files[]',
                    'contents' => fopen($input, 'r'),
                    'headers'  => ['Content-Type' => 'image/png']
                ],
            ]
        ]);
        return view('SearchEngin.imageFetshing')->with('response' ,$response->getBody());
    }
}
