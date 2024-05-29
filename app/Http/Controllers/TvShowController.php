<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TvShowController extends Controller
{
    public function index(){
        $popularShow= Http::withToken(config('services.tmdb.api_token'))->get('https://api.themoviedb.org/3/tv/popular')
        ->json()['results'];
        $topRatedShow= Http::withToken(config('services.tmdb.api_token'))->get('https://api.themoviedb.org/3/tv/top_rated')
        ->json()['results'];
        $upcomingShow= Http::withToken(config('services.tmdb.api_token'))->get('https://api.themoviedb.org/3/tv/on_the_air')
        ->json()['results'];
        $genresTV = Http::withToken(config('services.tmdb.api_token'))->get('https://api.themoviedb.org/3/genre/tv/list')
        ->json()['genres'];
        $genres = collect($genresTV)->mapWithKeys(function($genres){
            return [$genres['id'] => $genres['name']];
        });

        // dump($genresTV);
        // dump($popularShow);
        return view('tv', compact('topRatedShow', 'upcomingShow','popularShow','genres'));
    }

    public function show(int $id){
        $viewShow= Http::withToken(config('services.tmdb.api_token'))->get('https://api.themoviedb.org/3/tv/'.$id.'?append_to_response=credits,videos,images')
        ->json();
        // dump($viewShow);
        return view('showTV', compact('viewShow'));
    }
}
