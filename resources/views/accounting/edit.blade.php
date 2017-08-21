@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-8 col-md-offset-2">
                <h1>Upadte Payment</h1>
                <hr>

                <div class="futu_form">


                    {!! Form::model($payments, ['route' => ['accounting.update', $payments->id], 'method' => 'PUT', 'files' => true]) !!}


                    {{ Form::label('date', 'Date') }}
                    {{ Form::date('date', null, ['class' => 'my_input form-control']) }}

                    {{ Form::label('value', 'Value') }}
                    {{ Form::number('value', null, ['class' => 'my_input form-control']) }}

                    {{ Form::label('project_no', 'Project Number') }}
                    {{ Form::text('project_no', null, ['class' => 'my_input form-control']) }}

                    {{ Form::label('p_type', 'Type') }}
                    {{ Form::select('p_type', ['type1' => 'Type 1', 'type2' => 'Type 2', 'type3' => 'Type 3', ], null, ['class' => 'my_input form-control']) }}

                    {{ Form::label('stage', 'Stage') }}
                    {{ Form::text('stage', null, ['class' => 'my_input form-control']) }}

                    {{ Form::label('invoice', 'Invoice') }}
                    {{ Form::file('invoice', ['class' => 'my_input form-control']) }}

                    {{ Form::submit('Save', ['class' => 'my_input btn btn-success']) }}

                    {!! Form::close() !!}


                </div>

            </div>



        </div>
    </div>
@endsection
