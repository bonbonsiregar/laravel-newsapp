<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class NewsController extends Controller
{
    public function index(){
        $page = request()->has('page') ? request('page') : 1;
        $perPage = request()->has('per_page') ? request('per_page') : 10;
        $offset = ($page * $perPage) - $perPage;
        $api = env('API_KEY');
        $url = "https://newsapi.org/v2/top-headlines?country=id&apiKey=${api}";
        $news = [];
        $client = new \GuzzleHttp\Client();
        $res = $client->get($url);
        if($res->getStatusCode() == 200){
            $news = collect(json_decode(file_get_contents($url), true)['articles']);
        }else{
            return "error";
        }
        $results =  new LengthAwarePaginator(
            $news->slice($offset, $perPage),
            $news->count(),
            $perPage,
            $page,
            ['path' => request()->url(), 'query' => request()->query()]
        );
        return view('news', compact('results'));
    }
}
