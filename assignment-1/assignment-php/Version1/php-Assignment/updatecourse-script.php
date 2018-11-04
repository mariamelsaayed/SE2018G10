<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "school";
$namefetched = $_GET['name_fetched'];
$id = $_GET['id'];
$maxdegreefetched = $_GET['max_degree_fetched'];
$studyyearfetched = $_GET['study_year_fetched'];

echo "<h1>$namefetched</h1>";
echo "<h1>$id</h1>";
echo "<h1>$maxdegreefetched</h1>";
echo "<h1>$studyyearfetched</h1>";


try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // sql to update a record
    $sql = "UPDATE courses SET name = '$namefetched',max_degree = '$maxdegreefetched',study_year = '$studyyearfetched'  WHERE id='$id'";

   
    // use exec() because no results are returned
    $conn->exec($sql);
    echo "Record Updated successfully";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;
header("Location: courses.php");
die();
?> 