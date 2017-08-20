@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-xs-12">

                <h1 class="pull-left">All Payment</h1>
                <a href="{{ route('accounting.create') }}" class="pull-right btn btn-success btn-lg btn-h1">Add New</a>
                <div class="clearfix"></div>
                <hr>

            </div>

            <div class="col-xs-12">

                <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. A accusantium corporis dignissimos ducimus eaque hic inventore laboriosam laborum, laudantium omnis quasi reiciendis repudiandae saepe sint sit suscipit temporibus vero voluptate?</p>

                <!-- <table class="table table-bordered text-capitalize">
                    <tr>
                        <th>date</th>
                        <th>value</th>
                        <th>project no</th>
                        <th>type</th>
                        <th>stage</th>
                        <th>invoice</th>
                        <th>Settings</th>
                    </tr>



                        <tr>
                            <td>{{ //$payment->date }}</td>
                            <td>{{ //$payment->value }}</td>
                            <td>{{ //$payment->project_no }}</td>
                            <td>{{ //$payment->p_type }}</td>
                            <td>{{ //$payment->stage }}</td>
                            <td>{{ //$payment->image }}</td>
                            <td>
                                <a href="{{ //route('accounting.show', $payment->id) }}" class="btn btn-warning">Edit</a>
                                <a href="{{ //route('accounting.destroy', $payment->id) }}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>



                </table> -->


            </div>



        </div>
    </div>
@endsection
