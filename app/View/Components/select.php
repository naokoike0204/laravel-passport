<?php

namespace App\View\Components;


use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class select extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $name,
        public string $route,
        public string $value,
        public string $valueName,
    )
    {

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.select');
    }
}
