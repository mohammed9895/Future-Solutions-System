@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-xs-12">
                <h1 class="pull-left">All Descriptions</h1>
                <a href="{{ route('description.create') }}" class="pull-right btn-h1 btn-primary btn-lg">Add New Description</a>
                <div class="clearfix"></div>
                <hr>

            </div>

            <div class="col-xs-12">


                <table class="table table-bordered text-capitalize">
                    <tr>
                        <th>#</th>
                        <th>Description</th>
                        <th>Create At</th>
                        <th>Settings</th>
                    </tr>

                    @foreach($description as $desc)

                        <tr>
                            <td>{{ $desc->id }}</td>
                            <td>{{ $desc->description }}</td>
                            <td>{{ $desc->created_at }}</td>
                            <td>
                                <a href="{{ route('description.show', $desc->id) }}" class="btn btn-info">Show</a>
                                <a href="{{ route('description.edit', $desc->id) }}" class="btn btn-warning">Edit</a>
                                {!! Form::open(['route' => ['description.destroy', $desc->id], 'method' => 'DELETE' ]) !!}

                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}

                                {!! Form::close() !!}
                            </td>
                        </tr>

                    @endforeach

                </table>





            </div>



        </div>
    </div>
@endsection
