<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function getStatistics()
    {
        $projects = Project::all();
        $tasks    = Task::all();

        return view('layouts.partials.statistics',compact('projects','tasks'));
    }
}
