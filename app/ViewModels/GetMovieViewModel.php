<?php

namespace App\ViewModels;

use Carbon\Carbon;
use Spatie\ViewModels\ViewModel;

class GetMovieViewModel extends ViewModel
{
    public $movie;

    public function __construct($movie)
    {
        $this->movie = $movie;
    }

    public function movie(){
        return collect($this->movie)->merge([
            'poster_path' => 'https://image.tmdb.org/t/p/w500/'.$this->movie['poster_path'],
            'vote_average' => floor($this->movie['vote_average'] * 10) . "%",
            'release_date' => Carbon::parse($this->movie['release_date'])->format('M d, Y'),
            'release_year' => Carbon::parse($this->movie['release_date'])->format('Y'),
            
        ])->only(['poster_path','vote_average','release_date','release_year','title','tagline','overview']);
    }

}
