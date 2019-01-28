<div class="add card">
	<div class="card-header">
		<h5>Add film</h5>
		<input name="back" class="btn btn-link btn-sm" data-toggle="tooltip" title="Back to main page" type="submit" value="< Back">
	</div>
	<div class="card-body">
		<div class="form-row">
	    	<div class="col-2">
	    		<input type="text" name="name" class="form-control" placeholder="Name">
	    	</div>
	    	<div class="col-2">
	     		<input type="number" name="year" class="form-control" min="1895" max="<? echo date("Y");?>" placeholder="Year">
	    	</div>
	    	<div class="col-2">
	    		<input type="text" name="format" class="form-control" placeholder="Format">
	    	</div>
	    	<div class="col-5">
	    		<input type="text" name="actors" class="form-control" placeholder="Actors">
	    	</div>
	    	<div class="col">
	    		<input type="submit" name="add" id="add" class="btn btn-primary" data-toggle="tooltip" title="Press to add new file" value="Add">
	    	</div>
  		</div>
 	</div>
</div>