@extends('layouts.company')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <!-- data table -->
			<div class="panel panel-default">
				<div class="panel-heading">Customer Orders</div>
				<div class="panel-body">
            		<div class="table table-striped">
					<table class="table">
						<thead>
					      	<tr>
								<th>OrderNo</th>
								<th>Customer</th>
								<th>Product</th>
								<th>Amount</th>
								<th>Due Date</th>
								<th>Created At</th>
					      </tr>
					    </thead>
					   <tbody>
					    	@foreach($cuorder as $record)
								<tr class=
									@if($record->confirmed==true)
										"success"
									@else
										"danger"
									@endif

								>
									<td>{{ $record->oderno }}</td>
												<td>{{ $record->fname." ".$record->lname}}</td>
												<td>{{ $record->pname."-".$record->model }}</td>
												<td>{{ $record->amount }}</td>
												<td>{{ $record->reqdate}}</td>
												<td>{{ $record->created_at}}</td>
												<td>
													<form action="/acceptcusorder" method="post">
														 {{ csrf_field() }}
														<input type="hidden" name="oderno" value="{{$record->oderno}}">
														<button type="submit"class="editBtn btn btn-default btn-sm pull-right
															@if($record->confirmed==true)
																disabled
															@endif
															" href="#" >
														Confirm</button>
													</form>
													<form action="/cdeleteorder">
														 {{ csrf_field() }}
														<input type="hidden" name="oderno" value="{{$record->oderno}}">
														<button type="submit"class="editBtn btn btn-default btn-sm pull-right" href="#" >
														Delete</button>
													</form>
												</td>
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