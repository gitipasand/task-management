<div class="col-md-6">
    <div class="card">
        <div class="card-header">
            Projects
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <x-html.link-component title="Create Project" href="/project/create" style="btn btn-sm btn-primary my-2 float-end"/>
                </div>
            </div>
            <p><strong>Project Count:</strong> {{$projects->count()}}</p>
        </div>
    </div>
</div>
<div class="col-md-6">
    <div class="card">
        <div class="card-header">
            Tasks
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <x-html.link-component title="Create Task" href="/task/create" style="btn btn-sm btn-primary  my-2 float-end"/>
                </div>
            </div>
            <p><strong>Task Count:</strong> {{$tasks->count()}}</p>
        </div>
    </div>
</div>
