@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-8 col-md-offset-2">
                <h1>Create New Salary</h1>
                <hr>

                <div class="futu_form">


                    {!! Form::open(['route' => 'salary.store'] ) !!}


                    {{ Form::label('value', 'Salary Value') }}
                    {{ Form::number('value', '', ['class' => 'my_input form-control']) }}


                    {{ Form::label('employer', 'Salary for') }}
                    {{ Form::text('employer', '', ['class' => 'my_input form-control']) }}

                    {{ Form::label('type', 'Salary type') }}
                    {{ Form::text('type', '', ['class' => 'my_input form-control']) }}

                    {{ Form::submit('Add', ['class' => 'my_input btn btn-success']) }}

                    {!! Form::close() !!}


                </div>

            </div>



        </div>
    </div>
@endsection
