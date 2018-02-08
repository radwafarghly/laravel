@extends('layouts.app')
 
@section('content')
	<div class="row">
	    <div class="col-lg-12 margin-tb">
	        <div class="pull-left">
	            <h2>Projects CRUD</h2>
	        </div>
	        <div class="pull-right">
	        	@permission('project-create')
	            <a class="btn btn-success" href="{{ route('projects.create') }}"> Create New Project</a>
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
			<th>governate</th>
            <th>City</th>
			<th>Image</th>

			<th width="280px">Action</th>
			<th>Add Compound</th>
		</tr>
	@foreach ($projects as $key => $project)
	<tr>
		<td>{{ ++$i }}</td>
		<td>{{ $project->name }}</td>
		<td>{{ $project->governate }}</td>
        <td>{{ $project->city }}</td>
        <td>{{ $project->img }}</td>


		<td>
			<a class="btn btn-info" href="{{ route('projects.show',$project->id) }}">Show</a>
			@permission('project-edit')
			<a class="btn btn-primary" href="{{ route('projects.edit',$project->id) }}">Edit</a>
			@endpermission
			@permission('project-delete')
			{!! Form::open(['method' => 'DELETE','route' => ['projects.destroy', $project->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
        	{!! Form::close() !!}
        	@endpermission
		</td>
		<th>
		   @permission('compound-create')
		     <a class="btn btn-success" href="{{route('projects.indexcompound',$project->id) }}"> Add Compounds</a>
            @endpermission
		</th>
	</tr>
	@endforeach
	</table>
	{!! $projects->render() !!}
@endsection