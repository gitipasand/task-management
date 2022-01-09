<div class="table-responsive">
    <table class="table">
        <thead>
        <tr>
            <th>Row</th>
            <th>Title</th>
            <th>Description</th>
            <th>Priority</th>
            <th>Status</th>
            <th>Operation</th>
        </tr>
        </thead>
        <tbody>
        @forelse($tasks as $task)
            <tr>
                <td>{{$loop->index+1}}</td>
                <td>{{$task->title}}</td>
                <td>{{$task->description}}</td>
                <td>{{$task->priority}}</td>
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

