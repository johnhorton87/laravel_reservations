<!-- resources/views/index.blade.php -->

@extends('layouts.app')

@section('content')

    <!-- Bootstrap Boilerplate... -->

    <div class="panel-body">
        <!-- Display Validation Errors -->
        @include('common.errors')

        <div>
            Welcome to the theater studio reservation system. Studios are available to rent for your meetings, workshops, and rehearsals. The studio spaces are not available for performances, please speak with Theater staff regarding theater rentals.
        </div>
    
        <div class="col-sm-offset-10 col-sm-2">
         <a href='{{ url('studio') }}'>
             <button type="submit" class="btn btn-default">
                       View All Studios
            </button>
        </a>
        </div>
    </div>

    <!-- Studios List -->
        <div class='panel-body'>
          <ul class='pager'>
              <li class='previous'>
                <a href={{ url('/?sdate='.$lastweek)}}>Last Week</a>
                
             <li class='next'>
                <a href={{ url('/?sdate='.$nextweek)}}>Next Week</a>
                </li>
             </ul>
        </div>
        
   
                <table class="table table-striped task-table">

                    <!-- Table Headings -->
                    <thead>
                        <th>
                           Upcoming Reservations - {{ date("m/d/Y",strtotime($sdate)) }} to {{ date("m/d/Y",strtotime($edate)) }}
                            </th>
                       
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                        @if (count($reservations) > 0)
                        @foreach ($reservations as $reservation)
                            <tr>
                                <!-- Task Name -->
                                <td class="table-text">
                                    <div><a href='{{ url('studio/'.$reservation->studio_id) }}'>{{ $reservation->studioName() }} - {{ $reservation->date }}  @ {{ $reservation->timePretty() }}</a></div>
                                </td>
                            </tr>
                        @endforeach
                        @else
                            <tr>
                                <td>No upcoming reservations for this date range...</td>
                            </tr>
                        @endif
                    </tbody>
                </table>

        <?php
                    $curDate = $sdate;
                ?>
        <div class='calTable'>
            <div class='calBox calDate'>  
                  -
                </div>
            @while ( strtotime($curDate) < strtotime($nextweek) )
                <div class='calBox'>
                    {{ date("M j", strtotime($curDate)) }}
                </div>
                <?php $curDate = date ("Y-m-d", strtotime("+1 day", strtotime($curDate))); ?>
            @endwhile
            @for ($i = 9; $i < 21; $i++)
                <div class='calRow'>
                <?php
                    $curDate = $sdate;
                ?>
                <div class='calBox calDate'>  
                    @if ($i < 12)
                        {{$i}} AM
                    @elseif ($i == 12)
                        {{$i}} PM
                    @else
                        {{$i-12}} PM
                    @endif
                </div>
                @while ( strtotime($curDate) < strtotime($nextweek) )
                    <div class='calBox'> 
        
                                @if( isset($events[$curDate][$i.""]) )
                                
                                    @foreach ( $events[$curDate][$i.""] as $event )
					                    <div class='btn btn-sm btn-info'> {{ $event }} </div>
                                    @endforeach
                
                                @endif
                            
                        
                    </div>
                    <?php $curDate = date ("Y-m-d", strtotime("+1 day", strtotime($curDate))); ?>
                @endwhile
                </div>
            @endfor
        </div>
    
@endsection