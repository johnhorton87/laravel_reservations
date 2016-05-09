<!-- resources/views/studios.blade.php -->

@extends('layouts.app')

@section('content')

    <!-- Bootstrap Boilerplate... -->

    <div class="panel-body">
        <!-- Display Validation Errors -->
        @include('common.errors')

        <!-- New Studio Form -->
       
        <form action="{{ url('studio') }}" method="POST" class="form-horizontal">
            {!! csrf_field() !!}

            <!-- Studio Name -->
            <div class="form-group">
                <label for="studio" class="col-sm-3 control-label">Studio</label>

                <div class="col-sm-6">
                    <input type="text" name="name" id="studio-name" class="form-control">
                </div>
            </div>
             <div class="form-group">
                <label for="price" class="col-sm-3 control-label">Price</label>

                <div class="col-sm-6">
                    <input type="text" name="price" id="studio-price" class="form-control">
                </div>
            </div>

            <!-- Add Studio Button -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> Add A Studio
                    </button>
                </div>
            </div>
        </form>
    </div>

   
@endsection