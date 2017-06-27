@extends('layouts.company')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Company Orders</div>
                <div class="panel-body">
                	<button class="btn btn-default btn-sm pull-left" type="button" href="#"
	        		data-toggle="modal"  data-target="#addnewproduct">
	            	Make Order</button>
                
                
	                 <!-- data table -->
		            <div class="table table-striped">
							<table class="table">
								<thead>
							      	<tr>
							        <th>Order No</th>
							        <th>Oredred by</th>
							        <th>Product</th>
							        <th>Amount</th>
							        <th>Due Date</th>
							        <th>Created Date</th>
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
											<td>
												<form action="/arrivedorder" method="post">
													 {{ csrf_field() }}
													<input type="hidden" name="oderno" value="{{$record->oderno}}">
													<button type="submit"class="editBtn btn btn-default btn-sm pull-right
                                                        @if($record->confirmed==true)
                                                            disabled
                                                        @endif
                                                        " href="#" >
			                                        Arrived</button>
		                                        </form>
											</td>

										<tr>
									@endforeach
							    </tbody>

							</table>
					</div>

								<!-- add product model -->
			<!-- Modal -->
			<div id="addnewproduct" class="modal fade" role="dialog">
			  <div class="modal-dialog">

			    <!-- Modal content-->
			    <div class="modal-content">
			      	<div class="modal-header">
			        	<button type="button" class="close" data-dismiss="modal">&times;</button>
			        	<h4 class="modal-title">Make Order</h4>
		      		</div>



                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/makecompanyorder') }}">
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
        </div>
    </div>
</div>
@endsection