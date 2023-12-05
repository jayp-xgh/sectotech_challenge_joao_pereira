<?php

namespace App\View\Components\playlist;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PartialForm extends Component
{

    public function __construct()
    {

    }

    public function render(): View|Closure|string
    {
        return view('components.playlist.partial-form');
    }
}
