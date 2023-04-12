<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('apiauth');
    }
    
    public function index(){
        return view('home');
    }

    public function getAll()
    {
        $client = new Client();
        $response = $client->get('https://netzwelt-devtest.azurewebsites.net/Territories/All');

        return response($response->getBody())
            ->header('Content-Type', 'application/json')
            ->header('Access-Control-Allow-Origin', '*');
    }
}
