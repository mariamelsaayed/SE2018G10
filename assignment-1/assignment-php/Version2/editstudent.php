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
		$record = mysqli_query($db, "SELECT * FROM students WHERE id=$id");

			$n = mysqli_fetch_array($record);
			$name = $n['name'];

	}

?>



<div style=" padding-top:100px;"  class = "container">
<div   class = "jumbotron">
	<form class = "form-horizontal" method="post" action="server.php" >
			<label>Name</label>
			<input type="hidden" class="form-control" width = "100%" name="id" value="<?php echo $id; ?>">
            <input type="text" class="form-control" width = "100%" name="name" value="<?php echo $name; ?>">
			</br>
			<?php if ($update == true): ?>
	        <button class="btn btn-success" type="submit" name="update" style=" color:#ffffff ; background: #556B2F;" >Update</button>
            <?php else: ?>
	        <button class="btn btn-success" type="submit" name="save" >Save</button>
            <?php endif ?>
	</form>
</div>
</div>
</body>
</html>
