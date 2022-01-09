@extends('layouts.app')
@section('title',$title)
@section('content')
    <div class="card">
        <div class="card-header">{{$title}}</div>
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <x-html.link-component title="Create Project" href="/project/create" style="btn btn-primary my-2 float-end"/>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Row</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Operation</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($projects as $project)
                    <tr>
                        <td>{{$loop->index+1}}</td>
                        <td>{{$project->title}}</td>
                        <td>{{$project->description}}</td>
                        <td>{{\App\Models\Project::IS_ACTIVE[$project->is_active]}}</td>
                        <td>
                            <x-html.link-component title="Edit" href="/project/{{$project->id}}/edit" style="btn btn-primary btn-sm float-start mx-1"/>
                            <x-html.link-component title="Show" href="/project/{{$project->id}}" style="btn btn-warning btn-sm float-start mx-1"/>
                            @if(count($project->tasks) == 0)
                            <x-form-component action="/project/{{$project->id}}" method="DELETE">
                                <x-form.button-component type="submit" title="Delete" style="btn-sm" color="danger"/>
                            </x-form-component>
                            @endif
                        </td>
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
@endsection
