<div class="form-group my-2">
    <label class="py-2" for="{{$name}}">{{$title}}</label>
    <input type="{{$type ?? 'text'}}" class="form-control" name="{{$name}}" id="{{$name}}" @isset($value) value="{{$value}}" @endisset>
    <small class="form-text text-danger">{{$errors->first($name)}}</small>
</div>
