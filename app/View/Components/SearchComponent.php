<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SearchComponent extends Component
{
    public $fontAwesome;

    public $buttonType;

    public $text;


    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($fontAwesome, $buttonType, $text)
    {
        $this->fontAwesome = $fontAwesome;
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
