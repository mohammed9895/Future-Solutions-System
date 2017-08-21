@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-xs-12">
                <h1 class="pull-left">All Payment</h1>
                <a href="{{ route('accounting.create') }}" class="pull-right btn-h1 btn-primary btn-lg">Add New Payment</a>
                <div class="clearfix"></div>
                <hr>

            </div>

            <div class="col-xs-12">


                <table class="table table-bordered text-capitalize">
                    <tr>
                        <th>date</th>
                        <th>value</th>
                        <th>project no</th>
                        <th>type</th>
                        <th>stage</th>
                        <th>invoice</th>
                        <th>Settings</th>
                    </tr>

                    @foreach($payments as $payment)

                        <tr>
                            <td>{{ $payment->date }}</td>
                            <td>{{ $payment->value }}</td>
                            <td>{{ $payment->project_no }}</td>
                            <td>{{ $payment->p_type }}</td>
                            <td>{{ $payment->stage }}</td>
                            <td><strong><a data-toggle="modal" data-target="#invoice_{{ $payment->id }}">View Invoice</a></strong></td>
                            <td>
                                <a href="{{ route('accounting.show', $payment->id) }}" class="btn btn-info">Show</a>
                                <a href="{{ route('accounting.edit', $payment->id) }}" class="btn btn-warning">Edit</a>
                                {!! Form::open(['route' => ['accounting.destroy', $payment->id], 'method' => 'DELETE' ]) !!}

                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}

                                {!! Form::close() !!}
                            </td>
                            <!-- Modal -->
                            <div class="modal fade" id="invoice_{{ $payment->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel">Invoice</h4>
                                        </div>
                                        <div class="modal-body">
                                            <img src="{{ asset('invoices/' . $payment->image) }}" style="max-width: 100%;" alt="{{ $payment->project_no }}">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </tr>

                    @endforeach

                </table>


                <div class="text-center">
                    {{ $payments->links() }}
                </div>


            </div>



        </div>
    </div>
@endsection
