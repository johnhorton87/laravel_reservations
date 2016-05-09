<!-- resources/views/studios.blade.php -->

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
         <a href='{{ url('studio/add') }}'>
             <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> Add Studio
            </button>
        </a>
        </div>
    </div>

    <!-- Studios List -->
    @if (count($studios) > 0)
        
                <table class="table table-striped task-table">

                    <!-- Table Headings -->
                    <thead>
                        <th>Studio Name</th>
                        <th>&nbsp;</th>
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                        @foreach ($studios as $studio)
                            <tr>
                                <!-- Task Name -->
                                <td class="table-text">
                                    <div><a href='{{ url('studio/'.$studio->id) }}'>{{ $studio->name }}</a></div>
                                </td>
                                <td class="table-text">
                                    <div>{{ $studio->price }} / hr</div>
                                </td>

                                <td>
                                    <!-- TODO: Delete Button -->
                                          <a href='{{ url('studio/edit/'.$studio->id) }}'>
                                                <button type="button" class="btn btn-default">
                                                    <i class="fa fa-edit"></i> Edit
                                                </button>
                                            </a>
                                          <a href='{{ url('studio/delete/'.$studio->id) }}'>
                                              <button type="button" class="btn btn-danger">
                                                    <i class="fa fa-trash"></i> Delete
                                                </button>
                                            </a>
                           
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

    @endif
@endsection