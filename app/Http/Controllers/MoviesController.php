<?php

namespace App\Http\Controllers;

use App\ViewModels\GetMovieViewModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MoviesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $popularMovie = Http::withToken(config('services.tmdb.api_token'))->get('https://api.themoviedb.org/3/movie/popular')
        ->json()['results'];
        $topRatedShow= Http::withToken(config('services.tmdb.api_token'))->get('https://api.themoviedb.org/3/tv/top_rated')
        ->json()['results'];
        $upcomingMovie = Http::withToken(config('services.tmdb.api_token'))->get('https://api.themoviedb.org/3/movie/upcoming')
        ->json()['results'];
        $nowplayingMovie = Http::withToken(config('services.tmdb.api_token'))->get('https://api.themoviedb.org/3/discover/movie?with_origin_country=IN')
        ->json()['results'];
        // dump($nowplayingMovie);
        $genresMovie = Http::withToken(config('services.tmdb.api_token'))->get('https://api.themoviedb.org/3/genre/movie/list')
        ->json()['genres'];
        $genres = collect($genresMovie)->mapWithKeys(function($genres){
            return [$genres['id'] => $genres['name']];
        });
        // dump($upcomingMovie);
        // dump($genres);
        return view('index',compact('popularMovie','genres','topRatedShow','upcomingMovie','nowplayingMovie'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function allmovies()
    {

        $popularMovie = Http::withToken(config('services.tmdb.api_token'))->get('https://api.themoviedb.org/3/movie/popular?page=2')
        ->json()['results'];
        $topRatedMovie = Http::withToken(config('services.tmdb.api_token'))->get('https://api.themoviedb.org/3/discover/movie?with_origin_country=IN&page=2')
        ->json()['results'];
        $upcomingMovie = Http::withToken(config('services.tmdb.api_token'))->get('https://api.themoviedb.org/3/movie/upcoming?page=2')
        ->json()['results'];
        $nowplayingMovie = Http::withToken(config('services.tmdb.api_token'))->get('https://api.themoviedb.org/3/movie/now_playing?page=3')
        ->json()['results'];
        $genresMovie = Http::withToken(config('services.tmdb.api_token'))->get('https://api.themoviedb.org/3/genre/movie/list')
        ->json()['genres'];
        $genres = collect($genresMovie)->mapWithKeys(function($genres){
            return [$genres['id'] => $genres['name']];
        });
        dump($topRatedMovie);
        // dump($genres);
        return view('movies',compact('popularMovie','genres','topRatedMovie','upcomingMovie','nowplayingMovie'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $viewMovie = Http::withToken(config('services.tmdb.api_token'))->get('https://api.themoviedb.org/3/movie/'.$id.'?append_to_response=credits,videos,images')
        ->json();
        // dump($viewMovie);
        // $movie =  new GetMovieViewModel($viewMovie);
        // dump($viewMovie);
        // $viewMovie = $viewMovies->movie;
        
        // return $movie;
       return view('showmovie',compact('viewMovie'));
    //    return view('showmovie',$movie);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
