@extends('layout.app')

@section('content')

    <!-- Bootstrap Boilerplate... -->

    <div class="panel-body">
        <!-- Display Validation Errors -->
        @include('common.errors')
        <!-- New Task Form -->
        <form action="/task" method="POST" class="form-horizontal">
            {{ csrf_field() }}

            <!-- Task Name -->
            <div class="form-group">
                <label for="category" class="col-sm-3 control-label">Category</label>

                <div class="col-sm-2">
                    {!!Form::select('category',$data['categories'],$data['selected_category'],['class' => 'form-control'])!!}
                </div>                              
            </div>

            <!-- Add Task Button --> 
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-search"></i> Cerca schede
                    </button>
                </div>
            </div>
        </form>
        
        
    </div>

    <!-- TODO: Current Tasks -->
@endsection