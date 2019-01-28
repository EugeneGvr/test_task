<div class="show card">
  <div class="card-header">
    <h5>Information</h5>
    <input type="submit" name="back" class="btn btn-link btn-sm" data-toggle="tooltip" title="Back to main page" value="< Back">
  </div>
  <div class="card-body">
    <div class="form-row">
        <h2 class="card-title"><?php echo $film_info['name']?></h2>
    </div>
    <div class="form-row">
        <div class="col_name col-2">
          <h5><b>Year:</b></h5>
          <h5><b>Format:</b></h5>
          <h5><b>Actors:</b></h5>
        </div>
        <div class="col-8">
          <h5><?php echo $film_info['year'];?></h5> 
          <h5><?php echo $film_info['format'];?></h5>
          <?php foreach ($actors_info as $val): ?>
            <p><?php echo $val['name']." ".$val['surname'];?></p>
          <?php endforeach?>
        </div>
    </div>
  </div>
</div>