@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-8 col-md-offset-2">
                <h1>Upadte Description</h1>
                <hr>

                <div class="futu_form">


                    {!! Form::model($description, ['route' => ['description.update', $description->id], 'method' => 'PUT']) !!}


                    {{ Form::label('description', 'Description Number') }}
                    {{ Form::text('description', null, ['class' => 'my_input form-control']) }}

                    {{ Form::submit('Save', ['class' => 'my_input btn btn-success']) }}

                    {!! Form::close() !!}


                </div>

            </div>



        </div>
    </div>
@endsection
