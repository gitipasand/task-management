@extends('layouts.app')
@section('content')
    <div class="row" id="result"></div>
    <div class="row mt-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Show Project Tasks
                </div>
                <div class="card-body">
                    <x-project.list-component/>
                    <div class="row" id="task-result">

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    @parent
    <script>
        $(document).ready(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                'url':'{{url('api/get-statistics')}}',
                'method':'POST',
                'success': function(data){
                    $('#result').html(data)
                }
            });

            $('#project_id').on('change',function(){
                const project_id = $(this).val();
                $('#task-result').html("");
                $.ajax({
                    'url':'{{url('api/get-project-tasks')}}',
                    'method':'POST',
                    'data':{project_id:project_id},
                    'success': function(data){
                        $('#task-result').html(data)
                    }
                });
            })
        })
    </script>
@endsection
