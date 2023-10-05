<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Nette\Utils\Arrays;
use Ramsey\Uuid\Type\Integer;

class radio extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public object $lists,
        public string $name,
        public string $value
    )
    {
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.radio');
    }
}
