<?php

	$db = mysqli_connect('sql303.epizy.com', 'epiz_22947520','h1ce4Q8j7iOwG', 'epiz_22947520_school');

	// initialize variables
	$name = "";
	$id = 0;
	$max_degree = 0;
	$study_year = 0;
	$update = false;
	$student_id = 0;
	$course_id =0;
	$degree =0;
	$examine_at = "2000-00-00" ;


	if (isset($_POST['save'])) {
		$name = $_POST['name'];

		mysqli_query($db, "INSERT INTO students (name) VALUES ('$name')");
		header('location: students.php');
	}

	if (isset($_POST['savecourse'])) {
		$name = $_POST['coursename'];
		$max_degree = $_POST['max_degree'];http://asu-se2018g10.epizy.com/
		$study_year = $_POST['study_year'];

		mysqli_query($db, "INSERT INTO courses (coursename, max_degree, study_year) VALUES ('$name','$max_degree', '$study_year')");
		header('location: courses.php');
	}
	if (isset($_POST['savegrade'])) {
		$student_id=$_POST['student_id'];
		$course_id=$_POST['course_id'];
		$degree = $_POST['degree'];
		$examine_at = $_POST['examine_at'];

		mysqli_query($db, "INSERT INTO grades (student_id,course_id,degree, examine_at) VALUES ('$student_id','$course_id','$degree','$examine_at')");
		header('location: grades.php');
	}

	if (isset($_POST['update'])) {
	$id = $_POST['id'];
	$name = $_POST['name'];

	mysqli_query($db, "UPDATE students SET name='$name'  WHERE id=$id");
	header('location: students.php');
}

if (isset($_POST['updatecourse'])) {
	$id = $_POST['id'];
	$name = $_POST['coursename'];
	$max_degree = $_POST['max_degree'];
	$study_year = $_POST['study_year'];

	mysqli_query($db, "UPDATE courses SET coursename='$name', max_degree= '$max_degree', study_year= '$study_year'  WHERE id=$id");
	header('location: courses.php');
}
if (isset($_POST['updategrade'])) {
	$id = $_POST['id'];
	$degree = $_POST['degree'];
	$examine_at = $_POST['examine_at'];

	mysqli_query($db, "UPDATE grades SET degree='$degree',examine_at= '$examine_at'  WHERE id=$id");
	header('location: grades.php');
}

if (isset($_GET['del'])) {
	$id = $_GET['del'];
	mysqli_query($db, "DELETE FROM students WHERE id=$id");
	header('location: students.php');
}

if (isset($_GET['delcourse'])) {
	$id = $_GET['delcourse'];
	mysqli_query($db, "DELETE FROM courses WHERE id=$id");
	header('location: courses.php');
}
if (isset($_GET['delgrade'])) {
	$id = $_GET['delgrade'];
	mysqli_query($db, "DELETE FROM grades WHERE id=$id");
	header('location: grades.php');
}

?>
