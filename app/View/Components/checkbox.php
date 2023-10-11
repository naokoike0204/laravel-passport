<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class checkbox extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public object $lists,
        public string $name,
        public array $value,
        public string $name2
    )
    {
        $this->lists = $lists;
        $this->name = $name;
        $this->value = $value;
        $this->name2 = $name2;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.checkbox');
    }
}
