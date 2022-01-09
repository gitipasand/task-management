<div class="form-group my-2">
    <label class="py-2" for="{{$name}}">{{$title}}</label>
    <textarea class="form-control" name="{{$name}}" id="{{$name}}">{!! $value ?? ''!!}</textarea>
    <small class="form-text text-danger">{{$errors->first($name)}}</small>
</div>
