<!-- resources/views/studios.blade.php -->

@extends('layouts.app')

@section('content')

    <!-- Bootstrap Boilerplate... -->

    <div class="panel-body">
        <!-- Display Validation Errors -->
        @include('common.errors')

        <div>
            {{$studio->name}}
        </div>
        <div>
           Price: {{$studio->price}} / hr
        </div>
        <div class='col-sm-12'>
            <form action="{{ url('studio/reserve/'.$studio->id) }}" method="POST" class="form-horizontal">
                    {!! csrf_field() !!}
                    <div>
                        <input type='date' name='date' id='reservation-date'>
                    </div>
                    <div>
                        <input type='time' name='time' id='reservation-time'>
                    </div>
                    <div class="col-sm-offset-3 col-sm-6">
                        <button type="submit" class="btn btn-default">
                            <i class="fa fa-plus"></i> Add Reservation
                        </button>
                    </div>
            </form>
        </div>
    </div>
        @if (count($reservations) > 0 )

                <table class="table table-striped task-table">
                    <thead>
                            Reservations ({{count($reservations)}})
                    </thead>
                    @foreach ($reservations as $reservation)
                            <tr>
                                <!-- Task Name -->
                                <td class="table-text">
                                {{$reservation->date}} @ {{$reservation->timePretty()}}
                                </td>
                            </tr>
                    @endforeach
        
        @else
            <div>No reservations found</div>
        @endif
        
    
@endsection