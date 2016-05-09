<!-- resources/views/studios.blade.php -->

@extends('layouts.app')

@section('content')

    <!-- Bootstrap Boilerplate... -->

    <div class="panel-body">
        <!-- Display Validation Errors -->
        @include('common.errors')
        
         @if (count($studio) > 0)
         <form action="{{ url('studio/'.$studio->id) }}" method="POST">
        <div>
           Name:
          <input type="text" name="name" id="studio-name" class="form-control" value='{{ $studio->name }}'>
        </div>
        <div>
           Price / hr:
          <input type="text" name="price" id="studio-price" class="form-control" value='{{ $studio->price }}'>
        </div>
            <div>
           
                {!! csrf_field() !!}
              
    
                <button type="submit" class="btn btn-default">
                    <i class="fa fa-edit"></i> Finish Edit
                </button>
            </div>
        </form>
         @endif
    </div>

    
   
@endsection