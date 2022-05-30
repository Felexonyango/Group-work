<?php

include_once('AdminHome.html');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>courses</title>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
   
   <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container mt-2">
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
              <?php include 'msg.php';  ?>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
        </div>
        <div class="col-md-12">
            <div class="float-left">
                <h2>Course List</h2>
            </div>            
            <div class="float-right">
                <a href="upload.php" class="btn btn-success">Upload New Course</a>
            </div>
           
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Course Name</th>
                  <th scope="col">Course Code</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "School";
                
                $conn = new mysqli($servername,$username,$password,$dbname);
                
                if(!$conn){
                
                    echo "Failed";
                }
                $query="select * from course limit 200"; // Fetch all the data from the table customers
                $result=mysqli_query($conn,$query);
                ?>
                <?php if ($result->num_rows > 0): ?>
                <?php while($array=mysqli_fetch_row($result)): ?>
                <tr>
                    <th scope="row"><?php echo $array[0];?></th>
                    <td><?php echo $array[1];?></td>
                    <td><?php echo $array[2];?></td>
                    <td>
                    <a href="delete.php?id=<?php echo $array[0];?>" class="btn btn-danger">Delete</a>
                      <a href="Approve.html?id=<?php echo $array[0];?>" class="btn btn-primary">Approve</a>                </tr>
                <?php endwhile; ?>
                <?php else: ?>
                <tr>
                   <td colspan="3" rowspan="1" headers="">No Data Found</td>
                </tr>
                <?php endif; ?>
                <?php mysqli_free_result($result); ?>
              </tbody>
            </table>
        </div>
    </div>        
</div>
</body>
</html>