@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-xs-12">
                <h1>Payment No : {{ $payments->project_no }}</h1>
                <div class="clearfix"></div>
                <hr>

            </div>

            <div class="col-xs-12 col-md-8">


                <ul class="list-group">
                    <li class="list-group-item"><strong>Date : </strong>{{ $payments->date }}</li>
                    <li class="list-group-item"><strong>Value : </strong>{{ $payments->value }}</li>
                    <li class="list-group-item"><strong>Project Number : </strong>{{ $payments->project_no }}</li>
                    <li class="list-group-item"><strong>Type : </strong>{{ $payments->p_type }}</li>
                    <li class="list-group-item"><strong>Stage : </strong>{{ $payments->stage }}</li>
                    <li class="list-group-item"><strong><a data-toggle="modal" data-target="#invoice_{{ $payments->id }}">View Invoice</a></strong></li>
                </ul>


                <!-- Modal -->
                <div class="modal fade" id="invoice_{{ $payments->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Invoice</h4>
                            </div>
                            <div class="modal-body">
                                <img src="{{ asset('invoices/' . $payments->image) }}" style="max-width: 100%;" alt="{{ $payments->project_no }}">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!--

                -->


            </div>


            <div class="col-xs-12 col-md-4">


                <a href="{{ route('accounting.edit', $payments->id) }}" class="btn btn-warning btn-block">Edit</a>
                <a href="{{ route('accounting.create') }}" class="btn btn-warning btn-block">Add New</a>
                <br>
                {!! Form::open(['route' => ['accounting.destroy', $payments->id], 'method' => 'DELETE' ]) !!}

                {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) !!}

                {!! Form::close() !!}

            </div>


        </div>
    </div>
@endsection
