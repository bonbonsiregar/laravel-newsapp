<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(){
        $api = env('API_KEY');
        $url = "https://newsapi.org/v2/top-headlines?country=id&apiKey=${api}";
        $news = [];
        $client = new \GuzzleHttp\Client();
        $res = $client->get($url);
        if($res->getStatusCode() == 200){
            // $j = $res->getBody();
            // $obj = json_decode($j, true);
            // $news = $obj;
            $news = json_decode($res->getBody());
        }else{
            return "error";
        }
        return view('news', compact('news'));
    }
}
