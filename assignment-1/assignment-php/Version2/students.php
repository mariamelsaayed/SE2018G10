<style>
.btn-group {
	margin : 10px;
	float : right;
};
</style>


<?php

include_once('head.php');
include('server.php');

?>

<form class="navbar-form navbar-left" action="students.php" method="post">
  <div class="form-group">
    <input type="text" class="form-control" placeholder="Search" name="search">
  </div>
  <button type="submit" class="btn btn-default">Search</button>
</form>
</div>
</div>
</nav>

<?php

if (isset($_POST['search']))
{
	$searchingvalue = $_POST['search'];
	$results = mysqli_query($db, " SELECT * FROM students WHERE name LIKE '%$searchingvalue%'");

}
else
{
$results = mysqli_query($db, 'SELECT * FROM students');
}

?>



<div class = "page-header">
<h1 style="font-family:futura;" padding-upper = "50px" align = "center" >Students</h1>
</div>

<div class="container">
<div class="jumbotron">

<div class="btn-group">
<a  style="width: 150;" href="editstudent.php" class="btn btn-primary btn-lg" role="button">Add Student</a>
</br>
</div>

<table  class = "table table-responsive table-bordered table-striped" width = 100%>
	<thead>
		<tr>
			<th>Id</th>
			<th>Name</th>
			<th colspan="2">Action</th>
		</tr>
	</thead>

	   <?php  while ( $row = mysqli_fetch_array($results))   { ?>
		<tr>
			<td><?php echo $row['id']; ?> </td>
			<td><?php echo $row['name']; ?> </td>
			<td>
				<a  class="btn btn-primary btn-lg" role="button" href="editstudent.php?edit=<?php echo $row['id']; ?>" class="edit_btn" >Edit</a>
			</td>
			<td>
				<a  class="btn btn-danger btn-lg" role="button" href="server.php?del=<?php echo $row['id']; ?>" class="del_btn">Delete</a>
			</td>
		</tr>
	<?php } ?>
</table>
</body>
