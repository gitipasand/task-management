@extends('layouts.app')
@section('title',$title)
@section('content')
    <div class="card">
        <div class="card-header">
            {{$title}}
        </div>
        <div class="card-body">
            <x-form-component action="/project" method="post">
                <x-form.input-component name="title" value="{{old('title')}}" title="title"/>
                <x-form.text-component name="description" value="{{old('description')}}" title="description"/>
                <x-form.button-component type="submit" title="create project" color="success"/>
            </x-form-component>
        </div>
    </div>
@endsection
