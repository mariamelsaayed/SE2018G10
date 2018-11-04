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
		$record = mysqli_query($db, "SELECT * FROM grades WHERE id=$id");

			$n = mysqli_fetch_array($record);
      $student_id = $n['student_id'];
      $course_id = $n['course_id'];
			$degree = $n['degree'];
      $examine_at = $n['examine_at'];
	}

?>



<div style=" padding-top:100px;"  class = "container">
<div   class = "jumbotron">
	<form class = "form-horizontal" method="post" action="server.php" >
     <label>Student ID</label>
     <input type="hidden" class="form-control" width = "100%" name="id" value="<?php echo $id; ?>">
          <input type="text" class="form-control" width = "100%" name="student_id" value="<?php echo $student_id; ?>">
       </br>
      <label>Course ID</label>
      <input type="hidden" class="form-control" width = "100%" name="id" value="<?php echo $id; ?>">
          <input type="text" class="form-control" width = "100%" name="course_id" value="<?php echo $course_id; ?>">
       </br>
			<label>Degree</label>
			<input type="hidden" class="form-control" width = "100%" name="id" value="<?php echo $id; ?>">
            <input type="text" class="form-control" width = "100%" name="degree" value="<?php echo $degree; ?>">
		 	</br>
      <label>Examination Date</label>
      <input type="hidden" class="form-control" width = "100%" name="id" value="<?php echo $id; ?>">
            <input type="text" class="form-control" width = "100%" name="examine_at" value="<?php echo $examine_at; ?>">
       </br>
			<?php if ($update == true): ?>
	        <button class="btn" type="submit" name="updategrade" style=" color:#ffffff ; background: #556B2F;" >Update</button>
            <?php else: ?>
	        <button class="btn" type="submit" name="savegrade" >Save</button>
            <?php endif ?>
	</form>
</div>
</div>
</body>
</html>
