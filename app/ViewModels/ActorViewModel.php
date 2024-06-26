<?php

namespace App\ViewModels;

use Spatie\ViewModels\ViewModel;

class ActorViewModel extends ViewModel
{
    public $actors;
    public $page;
    public function __construct($actor,$page)
    {
        $this->actors = $actor;
        $this->page = $page;
    }

    public function actors(){

        return collect($this->actors)->map(function($actor){
            return collect($actor)->merge([
                'profile_path' => $actor['profile_path'] 
                ? 'https://image.tmdb.org/t/p/w500/'.$actor['profile_path'] 
                 :  'https://ui-avatars.com/api/?size=235&name='.$actor['name'] ,
                'known_for' => collect($actor['known_for'])->where('media_type','movie')->pluck('title')->union(
                    collect($actor['known_for'])->where('media_type','tv')->pluck('name')
                )->implode(', ')

            ])->only(['name','id','profile_path','known_for','known_for_department']);
        });
    }

    public function previous(){
        return $this->page > 1 ? $this->page - 1 : null;
    }
    public function next(){
        return $this->page < 500 ? $this->page + 1 : null;
    }
}
