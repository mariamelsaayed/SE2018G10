<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "school";
$id = 0;
$namefetched = $_GET['name_fetched'];

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    //last inserted id
    $statement = $conn->prepare("SELECT * FROM students;");
    $statement->execute();
    while($row = $statement->fetch(PDO::FETCH_ASSOC)) {
           $student = (object)$row;
           $id = $student->id;
     }

     $id = $id+1;

    $sql = "INSERT INTO students(id,name)
    VALUES ($id, '$namefetched')";

    // use exec() because no results are returned
    $conn->exec($sql);
    echo "Record Added successfully";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;
header("Location: students.php");
die();
?> 