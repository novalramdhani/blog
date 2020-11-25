<?php

namespace App\View\Components;

use Illuminate\View\Component;

class FormComponent extends Component
{
    public $post;

    public $categories;

    public $tags;

    public $submit;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($post, $categories, $tags, $submit)
    {
        $this->post = $post;
        $this->categories = $categories;
        $this->tags = $tags;
        $this->submit = $submit;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.form-component');
    }
}
