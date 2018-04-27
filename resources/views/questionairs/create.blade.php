@extends('layouts.app')


@section('content')
<div class="row">
	<div class="col-md-8 col-md-offset-2">	
		<div class="panel panel-info">
		  <div class="panel-heading">Create Questionair</div>
		  	<div class="panel-body">
		  		@if (Session::has('message'))
					<div class="alert alert-danger">{{ Session::get('message') }}</div>
				@endif
			  <form action="{{ route('questionairs.store') }}" method="post">
			  	@csrf
			    <div class="form-group">
			    	<div class="row">
			    		<label for="questionair_name" class="col-md-2">Questionair Name:</label>
				      	<div class="col-md-10">
					      	<input value="{{old('questionair_name')}}" type="text" class="form-control" placeholder="Enter Questionair Name" name="questionair_name">
					      	{{-- {{ Form::text('questionair_name', old('questionair_name') , array('class' => 'field')) }} --}}
							<p class="text-danger">{{ $errors->has('questionair_name') ? $errors->first('questionair_name') : '' }}</p>
					    </div>	
			    	</div>
			      
			    </div>
			    <div class="form-group">
			    	<div class="row">
					    <label for="duration" class="col-md-2">Duration:</label>
					    <div class="col-md-4">
						    <input type="number" class="form-control" placeholder="Enter Duration" name="duration">
						    <p class="text-danger">{{ $errors->has('duration') ? $errors->first('duration') : '' }}</p>
				    	</div>
					    <div class="col-md-4">
						    <select class="form-control" name="duration_type">
						    	<option value="m">Minutes</option>
						    	<option value="h">Hours</option>
						    </select>
						    <p class="text-danger">{{ $errors->has('duration_type') ? $errors->first('duration_type') : '' }}</p>
				    	</div>

			    	</div>
			    </div>
			    

			    <div class="form-group">
			    	<div class="row">
			    		<label for="resumable" class="col-md-2">Can Resume?</label>
			    		<div class="col-md-10">
				    		<input type="radio" name="resumable" value="1"> Yes
				    		<input type="radio" name="resumable" value="0"> No
			    		</div>
					    <p class="text-danger">{{ $errors->has('resumable') ? $errors->first('resumable') : '' }}</p>

			    	</div>
			    </div>
			    <button type="submit" class="btn btn-default">Submit</button>
			  </form>
		  	</div>
		</div>
	</div>
</div>

@endsection