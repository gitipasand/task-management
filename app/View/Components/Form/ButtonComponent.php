<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class ButtonComponent extends Component
{
    public $type;
    public $title;
    public $color;
    public $style;

    public function __construct($type,$title,$color,$style=null)
    {
        $this->type = $type;
        $this->title = $title;
        $this->color = $color;
        $this->style = $style;
    }

    public function render()
    {
        return view('components.form.button-component');
    }
}
