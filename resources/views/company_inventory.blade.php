@extends('layouts.company')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-sm-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Inventory</div>
                <div class="panel-body">
            	<button class="btn btn-default btn-sm pull-left" type="button" href="#"
            	data-toggle="modal"  data-target="#addnewproduct">
                Add Product</button>

                 <!-- data table -->
                <div class="table table-striped">
    					<table class="table">
    						<thead>
    					      	<tr>
    					        <th>Model No</th>
    					        <th>Product Name</th>
    					        <th>Units</th>
    					      </tr>
    					    </thead>
    					    <tbody>
    					    	@foreach($product as $record)
    					    		<tr>
    									<td>{{ $record->model }}</td>
    									<td>{{ $record->pname}}</td>
    									<td>{{ $record->units}}</td>
    									<td>
                                            <form action="/deleteproduct" method="post">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="model" value="{{$record->model}}">
                                                <button class="btn btn-default btn-sm pull-right" type="submit">
                                                Delete</button>
                                            </form>
    									</td>
    								</tr>
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
    			        	<h4 class="modal-title">Add Product</h4>
    		      		</div>
    			      	

    		        	 <form class="form-horizontal" role="form" method="POST" action="{{ url('/addproduct') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('model') ? ' has-error' : '' }}">
                                <label for="model" class="col-md-4 control-label">Model No</label>

                                <div class="col-md-6">
                                    <input id="model" type="text" class="form-control" name="model" value="{{ old('model') }}">

                                    @if ($errors->has('model'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('model') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('pname') ? ' has-error' : '' }}">
                                <label for="pname" class="col-md-4 control-label">Product Name</label>

                                <div class="col-md-6">
                                    <input id="pname" type="text" class="form-control" name="pname" value="{{ old('pname') }}">

                                    @if ($errors->has('pname'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('pname') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                           

                          

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-default">
                                      Add
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