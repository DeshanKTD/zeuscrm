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
					   <!--  <tbody>
					    	@foreach($corders as $record)
					    		<tr>
									<td>{{ $record->orderno }}</td>
									<td>{{ $record->fname." ".$record->lname}}</td>
									<td>{{ $record->company}}</td>
									<td>{{ $record->reqdate}}</td>
									<td>
                                        <a class="delBtn btn btn-default btn-sm pull-right" href="#">
                                        View</a>
                                        <a class="editBtn btn btn-default btn-sm pull-right" href="#">
                                        Confirm</a>
									</td>
								<tr>
							@endforeach
					    </tbody> -->

					</table>
			</div>   

			

        </div>
    </div>
</div>
@endsection