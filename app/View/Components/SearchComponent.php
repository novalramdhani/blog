<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SearchComponent extends Component
{
    public $buttonType;

    public $text;


    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($buttonType, $text)
    {
        $this->buttonType = $buttonType;
        $this->text = $text;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.search-component');
    }
}
