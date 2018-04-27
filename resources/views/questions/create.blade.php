@extends('layouts.app')


@section('content')
<div class="row">
	<div class="col-md-8 col-md-offset-2">	
		@if (Session::has('message'))
			<div class="alert alert-danger">{{ Session::get('message') }}</div>
		@endif
		<div class="panel panel-info">
		  <div class="panel-heading">Add Questions</div>
		  	<div class="panel-body">
		  	
			  <form action="{{ route('questions.store') }}" method="post" id="submit_form">
			  	@csrf
			  	<input type="hidden" name="questionair_id" value="{{$questionair_id}}">
				  	
				  	<div id="multiple-perticipents">
					  {{--  Here value is inserted by javascript --}}
	       			</div>
				
		
			    <button type="submit" id="submit" class="btn btn-primary pull-left">Submit</button>
			  </form>
			    <a id="addparticipant" class="btn btn-success pull-left" style="margin-left: 20px" href="javascript:void(0)" onclick="addParticipant()" >Add More Question <i class="fa fa-plus-square"></i></a>

		  	</div>
		</div>
	</div>
</div>

@endsection


@section('scripts')

<script type="text/javascript">

    var total_rows = 0;

	function addQuestion(data){

		var row = data.id;
		var row_id = row.substring(4);
		console.log(row_id); 

		var type = $('#type'+row_id).val();
		console.log(type);
		// $('#que_ans'+row_id).css('display','none');

		if(type == 0){
			html =
			'<div id="que_ans'+row_id+'">\
		    	<div class="row">\
		    		<label for="questionair_name" class="col-md-3">Question</label>\
		    		<div class="col-md-9">\
			    		<input type="text" required name="participant['+row_id+'][question]" class="form-control" name="">\
			    		<p></p>\
		    		</div>\
		    	</div>\
		    	<div class="row">\
		    		<label for="questionair_name" class="col-md-3">Answer</label>\
		    		<div class="col-md-9">\
			    		<input type="text" required  class="form-control" name="participant['+row_id+'][options][]">\
		    		</div>\
		    	</div>\
	    	</div>';
		}

		if(type == 1){
			html =
			'<div id="que_ans'+row_id+'">\
				<div class="row">\
		    		<label for="questionair_name" class="col-md-3">Question</label>\
		    		<div class="col-md-9">\
			    		<input type="text" required name="participant['+row_id+'][question]" class="form-control" name="">\
			    		<p></p>\
		    		</div>\
		    	</div>\
				<div class="row">\
		    		<label for="option1" class="col-md-3">Option 1</label>\
		    		<div class="col-md-7">\
			    		<input type="text" required class="form-control"  name="participant['+row_id+'][options][]">\
			    		<p></p>\
		    		</div>\
		    		<div class="col-md-2">\
			    		<input type="radio" required name="participant['+row_id+'][correct]" value="0"> Correct?\
			    		<p></p>\
		    		</div>\
				</div>\
				<div class="row">\
		    		<label for="option1" class="col-md-3">Option 2</label>\
		    		<div class="col-md-7">\
			    		<input type="text" required class="form-control"  name="participant['+row_id+'][options][]">\
			    		<p></p>\
		    		</div>\
		    		<div class="col-md-2">\
			    		<input type="radio" name="participant['+row_id+'][correct]" value="1"> Correct?\
			    		<p></p>\
		    		</div>\
				</div>\
				<div class="row">\
		    		<label for="option1" class="col-md-3">Option 3</label>\
		    		<div class="col-md-7">\
			    		<input type="text" required class="form-control" name="participant['+row_id+'][options][]">\
			    		<p></p>\
		    		</div>\
		    		<div class="col-md-2">\
			    		<input type="radio" name="participant['+row_id+'][correct]" value="2"> Correct?\
			    		<p></p>\
		    		</div>\
				</div>\
			</div>';
		}	

		if(type == 2){
			html =
			'<div id="que_ans'+row_id+'">\
				<div class="row">\
		    		<label for="questionair_name" class="col-md-3">Question</label>\
		    		<div class="col-md-9">\
			    		<input type="text" required name="participant['+row_id+'][question]" class="form-control" name="">\
			    		<p></p>\
		    		</div>\
		    	</div>\
				<div class="row">\
		    		<label for="option1" class="col-md-3">Option 1</label>\
		    		<div class="col-md-7">\
			    		<input type="text" required class="form-control" name="participant['+row_id+'][options][]">\
			    		<p></p>\
		    		</div>\
		    		<div class="col-md-2">\
			    		<input type="checkbox" name="participant['+row_id+'][correct][0]" value="0"> Correct?\
			    		<p></p>\
		    		</div>\
				</div>\
				<div class="row">\
		    		<label for="option1" class="col-md-3">Option 2</label>\
		    		<div class="col-md-7">\
			    		<input type="text" required class="form-control" name="participant['+row_id+'][options][]">\
			    		<p></p>\
		    		</div>\
		    		<div class="col-md-2">\
			    		<input type="checkbox" name="participant['+row_id+'][correct][1]" value="1"> Correct?\
			    		<p></p>\
		    		</div>\
				</div>\
				<div class="row">\
		    		<label for="option1" class="col-md-3">Option 3</label>\
		    		<div class="col-md-7">\
			    		<input type="text" required class="form-control" name="participant['+row_id+'][options][]">\
			    		<p></p>\
		    		</div>\
		    		<div class="col-md-2">\
			    		<input type="checkbox" name="participant['+row_id+'][correct][2]" value="2"> Correct?\
			    		<p></p>\
		    		</div>\
				</div>\
			</div>';
		}	

		$('#que_ans'+row_id).html(html);

	
	}


	 function addParticipant(){

        var participant_number;

        html =  
        '<div class="form-group test" id="row_'+participant_number+'">\
	    	<div class="row" >\
	    		<label for="questionair_name" class="col-md-3">Question Type</label>\
      			<div class="col-md-8">\
			      	<select class="form-control" name="participant['+total_rows+'][type]" onchange="addQuestion(this)" id="type'+total_rows+'">\
			      		<option value="0">Text</option>\
			      		<option value="1">Multiple Choice (Single Option)</option>\
			      		<option value="2">Multiple Choice (Multiple Option)</option>\
			      	</select>\
			      	<p class="text-danger">{{ $errors->has('questionair_name') ? $errors->first('questionair_name') : '' }}</p>\
	    		</div>\
	    		\
	    		<div class="col-md-1" style="padding-left:7px">\
	    			<button class="btn btn-danger" id="'+participant_number+'" onclick="remove_transaction_row(this)" type="button"><i class="fas fa-trash-alt"></i></button>\
	    		</div>\
	    	</div>\
	    	<div id="que_ans'+total_rows+'">\
		    	<div class="row">\
		    		<label for="questionair_name" class="col-md-3">Question</label>\
		    		<div class="col-md-9">\
			    		<input required type="text" name="participant['+total_rows+'][question]" class="form-control" name="">\
			    		<p class="text-danger">{{ $errors->has('questionair_name') ? $errors->first('questionair_name') : '' }}</p>\
		    		</div>\
		    	</div>\
		    	<div class="row">\
		    		<label for="questionair_name" class="col-md-3">Answer</label>\
		    		<div class="col-md-9">\
			    		<input type="text" required class="form-control" name="participant['+total_rows+'][options][]">\
			    		<p class="text-danger">{{ $errors->has('questionair_name') ? $errors->first('questionair_name') : '' }}</p>\
		    		</div>\
		    	</div>\
	    	</div>\
	    	<hr>\
	    </div>'
       

        $('#multiple-perticipents').append(html);
       
       
 		total_rows++;
 
    
        
    } 


    function remove_transaction_row(row){
   //  	if($(".test").length == 0) {
			//   console.log('asd');
			// }

	    	var row_id = row.id;
	    
	    	$('#row_'+row_id).remove();
    }


</script>

<script type="text/javascript">
	$('#submit_form').validate();
</script>

<script type="text/javascript">
	$(document).ready(function(){
		addParticipant();
	});
</script>
@endsection