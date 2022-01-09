@extends('layouts.app')
@section('title',$title)
@section('content')
    <div class="card">
        <div class="card-header">
            {{$title}}
        </div>
        <div class="card-body">
            <x-form-component action="/task/{{$task->id}}" method="PUT">
                <x-project.list-component :selected="$task->project_id"/>
                <x-form.input-component name="title" value="{{$task->title}}" title="title"/>
                <x-form.text-component name="description" value="{{$task->description}}" title="description"/>
                <x-form.button-component type="submit" title="edit task" style="my-2" color="warning"/>
            </x-form-component>
        </div>
    </div>
@endsection
