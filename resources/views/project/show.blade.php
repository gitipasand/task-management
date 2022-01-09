@extends('layouts.app')
@section('title',$title)
@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    {{$title}}
                </div>
                <div class="card-body">
                    <p>
                        <strong>Title: </strong>
                        {{$project->title}}
                    </p>
                    <p>
                        <strong>Description: </strong>
                        {{$project->description}}
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Tasks
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Row</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($project->tasks as $task)
                                <tr>
                                    <td>{{$loop->index+1}}</td>
                                    <td>{{$task->title}}</td>
                                    <td>{{$task->description}}</td>
                                    <td>{{\App\Models\Task::IS_ACTIVE[$task->is_active]}}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5">No Records</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
