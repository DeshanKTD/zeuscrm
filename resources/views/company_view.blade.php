@extends('layouts.company')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <!-- data table -->
            <div class="table table-striped">
					<table class="table">
						<thead>
					      	<tr>
					        <th>OrderNo</th>
					        <th>Customer</th>
					        <th>Company</th>
					        <th>Due Date</th>
					      </tr>
					    </thead>
					   <tbody>
					    	@foreach($cuorder as $record)
								<tr>
									<td>{{ $record->oderno }}</td>
												<td>{{ $record->fname." ".$record->lname}}</td>
												<td>{{ $record->pname."-".$record->model }}</td>
												<td>{{ $record->amount }}</td>
												<td>{{ $record->reqdate}}</td>
												<td>{{ $record->created_at}}</td>
												<td>
													<form action="/corderarrived">
														 {{ csrf_field() }}
														<input type="hidden" name="oderno" value="{{$record->oderno}}">
														<button type="submit"class="editBtn btn btn-default btn-sm pull-right" href="#" >
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
@endsection