@extends('layouts.app')
 
@section('content')
	<div class="row">
	    <div class="col-lg-12 margin-tb">
	        <div class="pull-left">
	            <h2>Compound CRUD</h2>
	        </div>
	        <div class="pull-right">
	        	@permission('compound-create')
	            <a class="btn btn-success" href="{{ route('projects.createcompound',$projectID->id) }}"> Create New Compound</a>
	            @endpermission
	        </div>
	    </div>
	</div>
	@if ($message = Session::get('success'))
		<div class="alert alert-success">
			<p>{{ $message }}</p>
		</div>
	@endif
	<table class="table table-bordered">
		<tr>
			<th>No</th>
            <th>Name</th>
			<th>location</th>
			<th>Image</th>
			<th width="280px">Action</th>
		</tr>
	@foreach ($compounds as $key => $compound)
	<tr>
		<td>{{ ++$i }}</td>
        <td>{{ $compound->name }}</td>
		<td>{{ $compound->loction }}</td>
		<td>{{ $compound->img }}</td>
		<td>
		@permission('compound-delete')
			{!! Form::open(['method' => 'DELETE','route' => ['projects.destroycompound', $compounds->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
        	{!! Form::close() !!}
        @endpermission
		</td>
	</tr>
	@endforeach
	</table>
	{!! $compounds->render() !!}
@endsection