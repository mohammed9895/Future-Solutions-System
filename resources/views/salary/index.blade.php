@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-xs-12">
                <h1 class="pull-left">All Salary</h1>
                <a href="{{ route('salary.create') }}" class="pull-right btn-h1 btn-primary btn-lg">Add New Description</a>
                <div class="clearfix"></div>
                <hr>

            </div>

            <div class="col-xs-12">


                <table class="table table-bordered text-capitalize">
                    <tr>
                        <th>#</th>
                        <th>Value</th>
                        <th>Type</th>
                        <th>Employer</th>
                        <th>At</th>
                        <th>Settings</th>
                    </tr>

                    @foreach($salary as $sala)

                        <tr>
                            <td>{{ $sala->id }}</td>
                            <td>{{ $sala->value }}</td>
                            <td>{{ $sala->type }}</td>
                            <td>{{ $sala->employer }}</td>
                            <td>{{ $sala->created_at }}</td>
                            <td>
                                <a href="{{ route('salary.show', $sala->id) }}" class="btn btn-info">Show</a>
                                <a href="{{ route('salary.edit', $sala->id) }}" class="btn btn-warning">Edit</a>
                                {!! Form::open(['route' => ['salary.destroy', $sala->id], 'method' => 'DELETE' ]) !!}

                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}

                                {!! Form::close() !!}
                            </td>
                        </tr>

                    @endforeach

                </table>



                <div class="text-center">
                    {{ $salary->links() }}
                </div>




            </div>



        </div>
    </div>
@endsection
