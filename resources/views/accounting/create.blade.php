@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-8 col-md-offset-2">
                <h1>Create New Payment</h1>
                <hr>

                <div class="futu_form">


                    {!! Form::open(['route' => 'accounting.store', 'files' => true] ) !!}


                    {{ Form::label('date', 'Date') }}
                    {{ Form::date('date', \Carbon\Carbon::now(), ['class' => 'my_input form-control']) }}

                    {{ Form::label('value', 'Value') }}
                    {{ Form::number('value', '', ['class' => 'my_input form-control']) }}

                    {{ Form::label('project', 'Project Number') }}
                    {{ Form::text('project', '', ['class' => 'my_input form-control']) }}

                    {{ Form::label('type', 'Type') }}
                    <select name="type" class="form-control my_input" id="type">
                        @foreach($description as $desc)

                            <option value="{{ $desc->description }}">{{ $desc->description }}</option>

                        @endforeach
                    </select>

                    {{ Form::label('stage', 'Stage') }}
                    {{ Form::text('stage', '', ['class' => 'my_input form-control']) }}

                    {{ Form::label('invoice', 'Invoice') }}
                    {{ Form::file('invoice', ['class' => 'my_input form-control']) }}

                    {{ Form::submit('Add', ['class' => 'my_input btn btn-success']) }}

                    {!! Form::close() !!}


                </div>

            </div>



        </div>
    </div>
@endsection
