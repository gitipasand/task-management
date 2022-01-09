<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class InputComponent extends Component
{

    public $name;
    public $title;
    public $value;
    public $type;

    public function __construct($name,$title,$value=null,$type = null)
    {
        $this->name = $name;
        $this->title = $title;
        $this->value = $value;
        $this->type = $type;
    }

    public function render()
    {
        return view('components.form.input-component');
    }
}
