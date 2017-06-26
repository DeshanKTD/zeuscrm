@extends('layouts.company')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
           <div class="panel panel-default">
                <div class="panel-heading">Customers</div>
                <div class="panel-body"> 
                   <button class="btn btn-default btn-sm pull-left" type="button" href="#"
                	data-toggle="modal"  data-target="#addnewclient">
                    Add Client</button>

                     <!-- data table -->
                    <div class="table table-striped">
        					<table class="table">
        						<thead>
        					      	<tr>
        					        <th>Model No</th>
        					        <th>Product Name</th>
        					        <th>Units</th>
        					        <th>Telephone</th>
        					      </tr>
        					    </thead>
        					    <tbody>
        					    	@foreach($cusers as $record)
        					    		<tr>
        									<td>{{ $record->fname." ".$record->lname }}</td>
        									<td>{{ $record->email}}</td>
        									<td>{{ $record->company}}</td>
        									<td>{{ $record->telephone}}</td>
        								</tr>
        							@endforeach
        					    </tbody>

        					</table>
        			</div>

        			<!-- add product model -->
        			<!-- Modal -->
        			<div id="addnewclient" class="modal fade" role="dialog">
        			  <div class="modal-dialog">

        			    <!-- Modal content-->
        			    <div class="modal-content">
        			      	<div class="modal-header">
        			        	<button type="button" class="close" data-dismiss="modal">&times;</button>
        			        	<h4 class="modal-title">Add Client</h4>
        		      		</div>


        		        	 <form class="form-horizontal" role="form" method="POST" action="{{ url('/addclient') }}">
                                {{ csrf_field() }}

                                <div class="form-group{{ $errors->has('fname') ? ' has-error' : '' }}">
                                    <label for="fname" class="col-md-4 control-label">First Name</label>

                                    <div class="col-md-6">
                                        <input id="fname" type="text" class="form-control" name="fname" value="{{ old('fname') }}">

                                        @if ($errors->has('fname'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('fname') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('lname') ? ' has-error' : '' }}">
                                    <label for="lname" class="col-md-4 control-label">Last Name</label>

                                    <div class="col-md-6">
                                        <input id="lname" type="text" class="form-control" name="lname" value="{{ old('lname') }}">

                                        @if ($errors->has('lname'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('lname') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('company') ? ' has-error' : '' }}">
                                    <label for="company" class="col-md-4 control-label">Company</label>

                                    <div class="col-md-6">
                                        <input id="company" type="text" class="form-control" name="company" value="{{ old('company') }}">

                                        @if ($errors->has('company'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('company') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                                    <label for="address" class="col-md-4 control-label">Company Address</label>

                                    <div class="col-md-6">
                                        <input id="address" type="text" class="form-control" name="address" value="{{ old('address') }}">

                                        @if ($errors->has('address'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('address') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('telephone') ? ' has-error' : '' }}">
                                    <label for="telephone" class="col-md-4 control-label">Telephone</label>

                                    <div class="col-md-6">
                                        <input id="telephone" type="text" class="form-control" name="telephone" value="{{ old('telephone') }}">

                                        @if ($errors->has('telephone'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('telephone') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                

                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label for="password" class="col-md-4 control-label">Password</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control" name="password">

                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                    <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation">

                                        @if ($errors->has('password_confirmation'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <input type="hidden" name="role" value="client">

                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fa fa-btn fa-user"></i> Register
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
</div>
@endsection