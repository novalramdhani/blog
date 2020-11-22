<?php

namespace App\View\Components;

use Illuminate\View\Component;

class NavbarComponent extends Component
{
    public $theme;

    public $typeNavbar;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($theme, $typeNavbar)
    {
        $this->theme = $theme;
        $this->typeNavbar = $typeNavbar;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.navbar-component');
    }
}
