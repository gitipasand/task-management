<form action="{{url($action)}}" method="post" @if($files) enctype="multipart/form-data" @endif>
    @csrf
    @method($method)
    {{$slot}}
</form>
