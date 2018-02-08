@extends('layouts.app')
 
@section('content')
	<div class="row">
	    <div class="col-lg-12 margin-tb">
	        <div class="pull-left">
	            <h2>Compound CRUD</h2>
	        </div>
	        <div class="pull-right">
	        	@permission('compound-create')
	            <a class="btn btn-success" href="{{ route('compounds.create',$project->id) }}"> Create New Compound</a>
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
			<a class="btn btn-info" href="{{ route('compounds.show',$compound->id) }}">Show</a>
			@permission('item-edit')
			<a class="btn btn-primary" href="{{ route('compounds.edit',$compound->id) }}">Edit</a>
			@endpermission
			@permission('compound-delete')
			{!! Form::open(['method' => 'DELETE','route' => ['compounds.destroy', $compound->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
        	{!! Form::close() !!}
        	@endpermission
		</td>
	</tr>
	@endforeach
	</table>
	{!! $compounds->render() !!}
@endsection