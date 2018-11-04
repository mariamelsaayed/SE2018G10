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

<form class="navbar-form navbar-left" action="grades.php" method="post">
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
	$results = mysqli_query($db, "SELECT grades.id , students.name  , courses.coursename , grades.degree , courses.max_degree, grades.examine_at
		FROM students, courses , grades
		WHERE grades.course_id = courses.id AND grades.student_id = students.id AND (students.name LIKE '%$searchingvalue%' OR courses.coursename LIKE '%$searchingvalue%')
		ORDER BY students.name");
}
else
{
  $results = mysqli_query($db, 'SELECT grades.id , students.name  , courses.coursename , grades.degree , courses.max_degree,grades.examine_at FROM students, courses , grades WHERE grades.course_id=courses.id AND grades.student_id =students.id');
}

?>



<div class = "page-header">
<h1 style="font-family:futura;" padding-upper = "50px" align = "center">Grades</h1>
</div>

<div class="container">
<div class="jumbotron">

<div class="btn-group">
<a  style="width: 150;" href="editgrade.php" class="btn btn-primary btn-lg" role="button">Add Grade</a>
</br>
</div>

<table  class = "table table-responsive table-bordered table-striped" width = 100%>
	<thead>
		<tr>
			<th>Id</th>
      <th>Student Name</th>
			<th>Course Name</th>
      <th>Degree</th>
      <th>Max Degree</th>
      <th>Examination Date</th>
			<th colspan="2">Action</th>
		</tr>
	</thead>

  <?php  while ( $row = mysqli_fetch_array($results))   { ?>
 <tr>
   <td><?php echo $row['id']; ?> </td>
   <td><?php echo $row['name']; ?> </td>
   <td><?php echo $row['coursename']; ?> </td>
   <td><?php echo $row['degree']; ?> </td>
   <td><?php echo $row['max_degree']; ?> </td>
   <td><?php echo $row['examine_at']; ?> </td>
   <td>
     <a  class="btn btn-primary btn-lg" role="button" href="editgrade.php?edit=<?php echo $row['id']; ?>" class="edit_btn" >Edit</a>
   </td>
   <td>
     <a  class="btn btn-danger btn-lg" role="button" href="server.php?delgrade=<?php echo $row['id']; ?>" class="del_btn">Delete</a>
   </td>
 </tr>
<?php } ?>
</table>
</body>
