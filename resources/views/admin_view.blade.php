@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
        	<!-- data table -->
            <div class="table table-striped">
					<table class="table">
						<thead>
					      	<tr>
					        <th>Name</th>
					        <th>email</th>
					        <th>Company</th>
					        <th>Role</th>
					      </tr>
					    </thead>
					    <tbody>
					    	@foreach($cusers as $record)
					    		<tr>
									<td>{{ $record->fname ." ".$record->lname }}</td>
									<td>{{ $record->email}}</td>
									<td>{{ $record->company}}</td>
									<td>{{ $record->role}}</td>
									<td>
                                        <a class="delBtn btn btn-default btn-sm pull-right" href="#">
                                        <i class="fa fa-trash fa-fw"></i></a>
                                        <a class="editBtn btn btn-default btn-sm pull-right" href="#">
                                        <i class="fa fa-pencil fa-fw"></i></a>
									</td>
								<tr>
							@endforeach
					    </tbody>

					</table>
			</div>   
			<!-- data view modal -->

			

        </div>
    </div>
</div>
@endsection
