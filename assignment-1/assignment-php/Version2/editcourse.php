<?php

include_once('head.php');
include_once('server.php');

?>
</div>
</nav>
</div>

<?php
if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM courses WHERE id=$id");

			$n = mysqli_fetch_array($record);
			$name = $n['coursename'];
      $max_degree = $n['max_degree'];
      $study_year = $n['study_year'];

	}

?>



<div style=" padding-top:100px;"  class = "container">
<div   class = "jumbotron">
	<form class = "form-horizontal" method="post" action="server.php" >
			<label>Course Name</label>
			<input type="hidden" class="form-control" width = "100%" name="id" value="<?php echo $id; ?>">
            <input type="text" class="form-control" width = "100%" name="coursename" value="<?php echo $name; ?>">
			</br>
      <label>Max Degree</label>
      <input type="hidden" class="form-control" width = "100%" name="id" value="<?php echo $id; ?>">
            <input type="text" class="form-control" width = "100%" name="max_degree" value="<?php echo $max_degree; ?>">
      </br>
      <label>Study Year</label>
      <input type="hidden" class="form-control" width = "100%" name="id" value="<?php echo $id; ?>">
            <input type="text" class="form-control" width = "100%" name="study_year" value="<?php echo $study_year; ?>">
      </br>
			<?php if ($update == true): ?>
	        <button class="btn" type="submit" name="updatecourse" style=" color:#ffffff ; background: #556B2F;" >Update</button>
            <?php else: ?>
	        <button class="btn" type="submit" name="savecourse" >Save</button>
            <?php endif ?>
	</form>
</div>
</div>
</body>
</html>
