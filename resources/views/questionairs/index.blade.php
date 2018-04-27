@extends('layouts.app')

@section('content')
<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<h2>Questionairs <a href="{{ route('questionairs.create') }}" class="btn btn-primary pull-right">Add Questionair</a></h2> 
		<table class="table table-striped table-bordered">
		  <thead>
		    <tr>
		      <th scope="col">#</th>
		      <th scope="col">Name</th>
		      <th scope="col">Number Of Question</th>
		      <th scope="col">Duration</th>
		      <th scope="col">Resumable</th>

		    </tr>
		  </thead>
		  <tbody>
		  	@foreach ($questionairs as $index => $questionair)
	  		  	<tr>
			      <th scope="row">{{$index+1}}</th>
			      <td>{{$questionair->questionair_name }}</td>
			      <td>{{count($questionair->questions) }} <a href="{{ route('questions.create',$questionair->id) }}">Add</a></td>
			      <td>{{$questionair->duration}}</td>
			      <td>{{$questionair->can_resume}}</td>

			    </tr>
		  	@endforeach
		  
		  </tbody>
		</table>
	</div>
</div>

@endsection