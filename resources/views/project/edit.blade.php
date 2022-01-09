@extends('layouts.app')
@section('title',$title)
@section('content')
    <div class="card">
        <div class="card-header">
            {{$title}}
        </div>
        <div class="card-body">
            <x-form-component action="/project/{{$project->id}}" method="PUT">
                <x-form.input-component name="title" value="{{$project->title}}" title="title"/>
                <x-form.text-component name="description" value="{{$project->description}}" title="description"/>
                <x-form.button-component type="submit" title="edit project" style="my-2" color="warning"/>
            </x-form-component>
        </div>
    </div>
@endsection
