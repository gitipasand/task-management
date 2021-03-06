@extends('layouts.app')
@section('title',$title)
@section('content')
    <div class="card">
        <div class="card-header">{{$title}}</div>
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <x-html.link-component title="Create Task" href="/task/create" style="btn btn-primary my-2 float-end"/>
                </div>
            </div>
            <div class="table-responsive">
                <div id="result"></div>
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                    <tr>
                        <th>Row</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Operation</th>
                    </tr>
                    </thead>
                    @forelse($projects as $project)
                        <tbody class="sortable" id="{{$project->id}}">
                            <tr class="project" style="background:#dddddd;">
                                <td colspan="5">{{$project->title}}</td>
                            </tr>
                            @foreach($project->tasks as $task)
                                <tr class="task" data-id="{{$project->id}}" id="item_{{$task->id}}">
                                    <td>{{$loop->index+1}}</td>
                                    <td>{{$task->title}}</td>
                                    <td>{{$task->description}}</td>
                                    <td>{{\App\Models\Task::IS_ACTIVE[$task->is_active]}}</td>
                                    <td>
                                        <x-html.link-component title="Edit" href="/task/{{$task->id}}/edit" style="btn btn-primary btn-sm float-start mx-1"/>
                                        <x-form-component action="/task/{{$task->id}}" method="DELETE">
                                            <x-form.button-component type="submit" title="Delete" style="btn-sm" color="danger"/>
                                        </x-form-component>
                                    </td>
                                </tr>
                            @endforeach
                            @empty
                            <tr>
                                <td colspan="5">No Records</td>
                            </tr>
                        </tbody>
                    @endforelse
                </table>
            </div>
        </div>
    </div>
@endsection
@section('js')
    @parent
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
    <script>
        $(document).ready(function(){
            const unOrderedList = $(".sortable").html();
            $( function(){
                $( ".sortable" ).sortable({
                    revert: 100,
                    items: 'tr.task',
                    cancel: 'thead',
                    axis: 'y',
                    update: function (event, ui) {
                        const data = $(this).sortable('serialize');
                        $.ajax({
                            data: data,
                            type: 'POST',
                            url: '{{url('api/task/sortable')}}',
                            success: function (){
                                $('#result').html("<div class='alert alert-success'>The operation was successful</div>")
                            },
                            error: function (){
                                $(".sortable").html(unOrderedList);
                                $('#result').html("<div class='alert alert-danger'>The operation failed</div>");
                            },
                        });
                    }
                });
            });
        });
 </script>
@endsection
