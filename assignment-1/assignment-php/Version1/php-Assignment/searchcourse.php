
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>SEG10 Assignment</title>
    

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    
    

    <!-- Custom styles for this template -->
    <link href="css/logo-nav.css" rel="stylesheet">
    

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#">
          <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/51/Deathly_Hallows_Sign.svg/1179px-Deathly_Hallows_Sign.svg.png" width="" height="30" alt="The Deathly Hallows">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="index.html">Home
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="students.php">Students</a>
              
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="courses.php">Courses</a>
              <span class="sr-only">(current)</span>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="grades.php">Grades</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Content -->
    <div class="container">
    

      <h1 class="mt-5">Courses Database</h1>
      
      
    
    </div>
    <!-- /.container -->

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<hr><br><br>
<div class="container">
<br><br><br>


<table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Maximum Degree</th>
      <th scope="col">Year of Study</th>
      <th></th>
    
    </tr>
  </thead> 
  <tbody>  

          <?php
                $namefetched = $_GET['name_fetched'];
                $driver = 'mysql';
                $database = "dbname=school";
                $dsn = "$driver:host=localhost;$database";
                try {
                $db = new PDO($dsn, "root", "");
                } catch(PDOException $e){ echo $e->getMessage(); }
                $sql="SELECT * FROM courses
                WHERE
                courses.name LIKE '$namefetched'";
                $result = $db->query($sql);
               
               //printing the Table
                while($row = $result->fetch(PDO::FETCH_ASSOC)) {
                $course = (object)$row;
                
                echo "<tr>
                          <th>$course->id</th>
                          <td>$course->name</td>
                          <td>$course->max_degree</td>
                          <td>$course->study_year</td>
                          <td><a role=\"button\" class=\"btn btn-warning\" href=\"updatecourse.php?id=$course->id\">Update</a>
                          <a role=\"button\" class=\"btn btn-danger\" href=\"deletecourse.php?id=$course->id\">Delete</a></td>
                      </tr>"
                      ;
               
                }
          ?>
</tbody>
</table>
</div>
  </body>

</html>


