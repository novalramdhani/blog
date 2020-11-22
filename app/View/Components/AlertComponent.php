<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AlertComponent extends Component
{
    public $alertType;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($alertType)
    {
        $this->alertType = $alertType;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.alert-component');
    }
}
