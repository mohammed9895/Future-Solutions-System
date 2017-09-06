@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-xs-12">
                <h1>Salary For : {{ $salary->employer }}</h1>
                <div class="clearfix"></div>
                <hr>

            </div>

            <div class="col-xs-12 col-md-8">


                <ul class="list-group">
                    <li class="list-group-item"><strong>Value : </strong>{{ $salary->value }}</li>
                    <li class="list-group-item"><strong>Type : </strong>{{ $salary->type }}</li>
                    <li class="list-group-item"><strong>Employer : </strong>{{ $salary->employer }}</li>
                </ul>





            </div>


            <div class="col-xs-12 col-md-4">


                <a href="{{ route('accounting.edit', $salary->id) }}" class="btn btn-warning btn-block">Edit</a>
                <br>
                {!! Form::open(['route' => ['accounting.destroy', $salary->id], 'method' => 'DELETE' ]) !!}

                {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) !!}

                {!! Form::close() !!}

            </div>


        </div>
    </div>
@endsection
