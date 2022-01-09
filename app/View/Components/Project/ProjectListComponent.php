<?php

namespace App\View\Components\Project;

use App\Models\Project;
use Illuminate\View\Component;

class ProjectListComponent extends Component
{
    public $projects;
    public $selected;

    public function __construct(Project $project , $selected = null)
    {
        $this->projects = $project->all();
        $this->selected = $selected;
    }

    public function render()
    {
        return view('components.project.project-list-component');
    }

    public function isSelected($option)
    {
        return $option === $this->selected;
    }
}
