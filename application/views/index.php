<div class="index card">
	<h5 class="card-header">Films</h5>
  	<ul class="list-group list-group-flush">
	    <li class="list-group-item">
			<div class="btn-group" role="group">
				<input name="add" class="btn btn-dark" data-toggle="tooltip" title="Press to add new film" type="submit" value="Add">
				<input name="sort" class="btn btn-dark" data-toggle="tooltip" title="Press to sort films  by name" type="submit" value="Sort by name">
				<input name="import" class="btn btn-dark" data-toggle="tooltip" title="Press to import films from text file" type="submit" value="Import">
			</div>
	    </li>
	    <li class="list-group-item">
	    	<div class="input-group">
	  			<input type="text" name="name_search_value" class="form-control" placeholder="Film name">
	 			<div class="input-group-append">
					<input name="name_search" class="btn btn-primary" type="submit" value="Search">
				</div>
			</div>	
	    </li>
	    <li class="list-group-item">
	    	<div class="input-group">
	  			<input type="text" name="actor_search_value" class="form-control" placeholder="Actor name">
	 			<div class="input-group-append">
					<input name="actor_search" class="btn btn-primary" type="submit" value="Search">
				</div>
			</div>	
	    </li>
	    <li class="list-group-item">
	    	<table class="table">
	 			<thead class="thead-dark">
	    			<tr>
				     	<th scope="col">Name</th>
				     	<th scope="col"></th>
				     	<th scope="col"></th>
			    	</tr>
	  			</thead>
				<tbody>
					<?php foreach ($films as $val): ?>
						<tr>
				     		<td id='film'><? echo $val['name']?></td>
				     		<td class="td-btn"><input type="submit" name= "open_<? echo $val['id']?>" class="btn btn-primary" value="Open"></td>
				     		<td class="td-btn"><input type="submit" name= "delete_<? echo $val['id']?>" class="btn btn-danger" value="Delete"></td>
			    		</tr>
					<?php endforeach?>
	  			</tbody>
			</table>
	    </li>
	</ul>
</div>


