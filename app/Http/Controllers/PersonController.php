<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ViewModels\ActorViewModel;
use App\ViewModels\ActorViewsModel;
use Illuminate\Support\Facades\Http;

class PersonController extends Controller
{
    public function index($page = 1){
        $popularPerson = Http::withToken(config('services.tmdb.api_token'))->get('https://api.themoviedb.org/3/person/popular?page='.$page)
        ->json()['results'];
        // dump($popularPerson);
        
        $actors = new ActorViewModel($popularPerson,$page);
        // return $actors;
        return view('person',$actors);
        // return view('person',compact('popularPerson'));
    }

    public function show($id){
        $actor = Http::withToken(config('services.tmdb.api_token'))->get('https://api.themoviedb.org/3/person/'.$id)
        ->json();
        $social = Http::withToken(config('services.tmdb.api_token'))->get('https://api.themoviedb.org/3/person/'.$id.'/external_ids')
        ->json();
        $credits = Http::withToken(config('services.tmdb.api_token'))->get('https://api.themoviedb.org/3/person/'.$id.'/combined_credits')
        ->json();
        
        $viewModel = new ActorViewsModel($actor,$social,$credits);
        // return $credits;
        return view('showperson',$viewModel);
    }
}
