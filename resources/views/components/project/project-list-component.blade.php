<div class="form-group my-2">
    <label class="py-2" for="project_id">Projects</label>
    <select class="form-control" name="project_id" id="project_id">
        <option value="">--Select Project--</option>
        @foreach($projects as $project)
            <option {{ $isSelected($project->id) ? 'selected="selected"' : '' }} value="{{$project->id}}">{{$project->title}}</option>
        @endforeach
    </select>
    <small class="form-text text-danger">{{$errors->first('project_id')}}</small>
</div>
