@extends('layouts.customer')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Make client orders</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/clientmakeorder') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('model') ? ' has-error' : '' }}">
                            <label for="model" class="col-md-4 control-label">Model</label>

                            <div class="col-md-6">
                                {{--<input id="model" type="text" class="form-control" name="model" value="{{ old('model') }}">--}}
                                <select class="form-control" id="sel1" name="model">
                                    @foreach($product as $record)
                                        <option value="{{$record->model}}">{{$record->pname}}</option>
                                    @endforeach
                                    @if ($errors->has('model'))
                                        <span class="help-block">
                                                <strong>{{ $errors->first('model') }}</strong>
                                            </span>
                                    @endif
                                </select>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('amount') ? ' has-error' : '' }}">
                            <label for="amount" class="col-md-4 control-label">Amount</label>

                            <div class="col-md-6">
                                <input id="amount" type="text" class="form-control" name="amount" value="{{ old('amount') }}">

                                @if ($errors->has('amount'))
                                    <span class="help-block">
                                                <strong>{{ $errors->first('amount') }}</strong>
                                            </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('reqdate') ? ' has-error' : '' }}">
                            <label for="reqdate" class="col-md-4 control-label">Request Date</label>

                            <div class="col-md-6">
                                <input id="reqdate" type="text" class="form-control" name="reqdate" value="{{ old('reqdate') }}">

                                @if ($errors->has('reqdate'))
                                    <span class="help-block">
                                                <strong>{{ $errors->first('reqdate') }}</strong>
                                            </span>
                                @endif
                            </div>
                        </div>


                        <input type="hidden" name="confirmed" value="0">

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i> Make
                                </button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection