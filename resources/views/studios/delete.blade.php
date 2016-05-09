<!-- resources/views/studios.blade.php -->

@extends('layouts.app')

@section('content')

    <!-- Bootstrap Boilerplate... -->

    <div class="panel-body">
        <!-- Display Validation Errors -->
        @include('common.errors')
        
         @if (count($studio) > 0)
        <div>
            Are you sure you'd like to delete this studio?
        </div>
        <div>{{ $studio->name }}</div>
           <form action="{{ url('studio/'.$studio->id) }}" method="POST">
                {!! csrf_field() !!}
                {!! method_field('DELETE') !!}
    
                <button type="submit" class="btn btn-danger">
                    <i class="fa fa-trash"></i> Confirm Delete
                </button>
            </form>
        </div>
         @endif
    </div>

    
   
@endsection