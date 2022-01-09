<?php

namespace App\View\Components\Html;

use Illuminate\View\Component;

class LinkComponent extends Component
{
    public $href;
    public $style;
    public $title;

    public function __construct($href,$style,$title)
    {
        $this->href = $href;
        $this->style = $style;
        $this->title = $title;
    }

    public function render()
    {
        return view('components.html.link-component');
    }
}
