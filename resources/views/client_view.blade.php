@extends('layouts.customer')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Orders Client list</div>
                <div class="panel-body">
                    <!-- data table -->
                    <div class="table ">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Order No</th>
                                <th>Oredred by</th>
                                <th>Product</th>
                                <th>Amount</th>
                                <th>Due Date</th>
                                <th>Created Date</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($order as $record)
                                <tr class=
                                @if($record->confirmed==true)
                                    "success"
                                @else
                                    "warning"
                                @endif
                                >
                                    <td>{{ $record->oderno }}</td>
                                    <td>{{ $record->fname." ".$record->lname}}</td>
                                    <td>{{ $record->pname."-".$record->model }}</td>
                                    <td>{{ $record->amount }}</td>
                                    <td>{{ $record->reqdate}}</td>
                                    <td>{{ $record->created_at}}</td>
                                    @if($record->confirmed==true)
                                        <td>Confirmed</td>
                                    @else
                                        <td>Pending</td>
                                    @endif

                                <tr>
                            @endforeach
                            </tbody>

                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection