<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "school";
$id = 0;
$namefetched = $_GET['name_fetched'];
$maxdegreefetched = $_GET['max_degree_fetched'];
$studyyearfetched = $_GET['study_year_fetched'];


try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    //last inserted id
    $statement = $conn->prepare("SELECT * FROM courses;");
    $statement->execute();
    while($row = $statement->fetch(PDO::FETCH_ASSOC)) {
           $course = (object)$row;
           $id = $course->id;
     }

     $id = $id+1;

    $sql = "INSERT INTO courses(id,name,max_degree,study_year)
    VALUES ($id, '$namefetched',$maxdegreefetched,$studyyearfetched)";

    // use exec() because no results are returned
    $conn->exec($sql);
    echo "Record Added successfully";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;
header("Location: courses.php");
die();
?> 