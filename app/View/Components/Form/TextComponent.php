<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class TextComponent extends Component
{
    public $name;
    public $title;
    public $value;
    public $editor;

    public function __construct($name,$title,$value=null,$editor = false)
    {
        $this->name = $name;
        $this->title = $title;
        $this->value = $value;
        $this->editor = $editor;
    }

    public function render()
    {
        return view('components.form.text-component');
    }
}
