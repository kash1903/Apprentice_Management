<?php
 $connection=mysqli_connect("localhost","root","");
 $db=mysqli_select_db($connection,"dbcrud");


if(isset($_POST['submit'])){

    $name=$_POST['name'];
     $address=$_POST['address'];
     $mobile=$_POST['mobile'];

     $sql="insert into student(name,address,mobile) values('$name','$address','$mobile')";
     
     if(mysqli_query($connection,$sql)){
        echo'<script>location.replace("index.php")</script>';
     }

     else
     echo 'something wrong'.$connection->error;


}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="card" >
                 <div class="card-header">
                    <h1>Student Management</h1>

                 </div>
                 <div class="card-body">
                 <form action="add.php" method="post">
                    <div class="form-group">
                        <label >Name</label>
                        <input type="text" name="name" class="form-control"  placeholder="Enter your name ">
                        
                    </div>

                    <div class="form-group">
                        <label >Address</label>
                        <input type="text" name="address" class="form-control"  placeholder="Enter your Address ">
                        
                    </div>

                    <div class="form-group">
                        <label >Mobile</label>
                        <input type="text"name="mobile" class="form-control"  placeholder="Enter your Mobile ">
                        
                    </div>
                    <br/>
                   
                    <button type="submit" class="btn btn-primary" name="submit" value="Register">Submit</button>
                    </form>
    
                   </div>
               

                </div>

            </div>

        </div>

    </div>
</body>
</html>