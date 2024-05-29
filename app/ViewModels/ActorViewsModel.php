<?php

namespace App\ViewModels;

use Carbon\Carbon;
use Spatie\ViewModels\ViewModel;

class ActorViewsModel extends ViewModel
{
     PUBLIC $actor;
     public $social;
     public $credits;
    public function __construct($actor,$social,$credits)
    {
        $this->actor = $actor;
        $this->social = $social;
        $this->credits = $credits;
    }

    public function actor(){
        return collect($this->actor)->merge([
            'birthday' => Carbon::parse($this->actor['birthday'])->format('M d, Y'),
            'age' => Carbon::parse($this->actor['birthday'])->age . " years old",
            'profile_path' => $this->actor['profile_path']
            ? "https://image.tmdb.org/t/p/w500". $this->actor['profile_path']
            : '',

        ]);
    }

    public function social(){
        return collect($this->social)->merge([
            'facebook' => $this->social['facebook_id'] ? 'https://www.facebook.com/'.$this->social['facebook_id'] : null,
            'twitter' => $this->social['twitter_id'] ? 'https://x.com/'.$this->social['twitter_id'] : null,
            'instagram' => $this->social['instagram_id'] ? 'https://www.instagram.com/'.$this->social['instagram_id'] : null,
            'wiki' => $this->social['wikidata_id'] ? 'https://www.wikidata.org/wiki/'.$this->social['wikidata_id'] : null,
        ])->only(['facebook', 'twitter', 'instagram', 'wiki']);
        // ->dump();
    }

    public function movies(){
        $cast = collect($this->credits)->get('cast');

        return collect($cast)->where('media_type','movie')->sortByDesc('popularity')->take(6)
        ->map(function($mov){

            if(isset($mov['title'])){
                $title = $mov['title'];
            }elseif(isset($mov['name'])){
                $title = $mov['name'];
            }else{
                $title = '';
            }

            return collect($mov)->merge([
                'poster_path' => $mov['poster_path']? "https://image.tmdb.org/t/p/w500". $mov['poster_path'] : null,
                'title' => $title,
            ]);
        });
       
    }


    public function credits(){
        $castMovie =  collect($this->credits)->get('cast');

        return collect($castMovie)->map(function($movie){

            if(isset($movie['release_date'])){
                $relDate = $movie['release_date'];
            }elseif(isset($movie['first_air_date'])){
                $relDate = $movie['first_air_date'];
            }else{
                $relDate = '';
            }

            if(isset($movie['title'])){
                $title = $movie['title'];
            }elseif(isset($movie['name'])){
                $title = $movie['name'];
            }else{
                $title = '';
            }

            return collect($movie)->merge([
                'release_date' => $relDate,
                'release_year' => isset($relDate) ? Carbon::parse($relDate)->format('Y') : 'Future',
                'title' => $title,
                'character' => isset($movie['character']) ? $movie['character'] : ''

            ]);
        })->sortByDesc('release_date');
    }
}
