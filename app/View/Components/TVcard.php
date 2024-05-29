<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TVcard extends Component
{
    public $show;
    public $genres;
    public function __construct($show,$genres)
    {
        $this->show = $show;
        $this->genres = $genres;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.tv-card');
    }
}
