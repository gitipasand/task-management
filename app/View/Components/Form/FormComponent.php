<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class FormComponent extends Component
{
    public $method;
    public $action;
    public $files;

    public function __construct($method,$action,$files=false)
    {
        $this->method = $method;
        $this->action = $action;
        $this->files  = $files;
    }

    public function render()
    {
        return view('components.form.form-component');
    }
}
