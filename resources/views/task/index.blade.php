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
                <table class="table">
                    <thead>
                    <tr>
                        <th>Row</th>
                        <th>Project</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Operation</th>
                    </tr>
                    </thead>
                    <tbody id="sortable">
                    @forelse($tasks as $task)
                    <tr class="ui-state-default" id="{{$task->id}}">
                        <td>{{$loop->index+1}}</td>
                        <td>{{$task->project->title}}</td>
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
@section('js')
    @parent
    <script>
        $( function(){
            $( "#sortable" ).sortable({
                start: function(event, ui) {
                    ui.item.startPos = ui.item.index();
                },
                stop: function(event, ui) {
                    const start = ui.item.startPos;
                    const end = ui.item.index();
                    const row = ui.item.attr("id");

                    console.log('start',start);
                    console.log('end',end);
                    console.log('row',row);
                }
            });
        });
    </script>
@endsection
