<?php 
include "nav.php";
$con=mysqli_connect('localhost','root',"",'php');
$name="";
$phone="";
$address="";
$update="";
if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $phone=$_POST['phone'];
    $adddress=$_POST['address'];
    $q="INSERT INTO `users`(`name`, `phone`, `address`) VALUES ('$name','$phone','$adddress')";
     $result = mysqli_query($con,$q);
    header('location:list.php');
}
if (isset($_GET['edit_id'])) {
    $id = $_GET['edit_id'];
    $update = true;
    $q="SELECT * FROM `users` WHERE 1";
    $record = mysqli_query($con,$q);
    // if (count($record) == 1 ) {
    //     $n = mysqli_fetch_array($record);
    //     $name = $n['name'];
    //     $address = $n['address'];
    // }
   $data= mysqli_fetch_array($record);
         $name=$data['name'];
         $phone=$data['phone'];
         $address=$data['address'];
}
if(isset($_POST['update'])){
    $name=$_POST['name'];
    $phone=$_POST['phone'];
    $adddress=$_POST['address'];
    $q="UPDATE `users` SET `name`='$name',`phone`='$phone',`address`='$adddress' WHERE id=$id";
     $result = mysqli_query($con,$q);
     header('location:list.php');
}



?>


<!doctype html>
<html lang="en">
  <head>
    <title>Home</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.0-beta1 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"  integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

  </head>
  <body>
    
    <div class="crud-form">
        <div class="container">
            <div class="row">
                <div class="col-3"></div>
                <div class="col-6">
                    <h3 class="text-center " style="margin-top:6%">Crud Opration</h3>
                    <div class="card" style="margin-top:10%">
                        <div class="card-body">
                            <form action="" method="post">
                                <div class="form-group" style="margin-top:10%">
                                    <label for="">Name</label>
                                    <input type="text" name="name" id="" class="form-control" value="<?php echo $name?>">
                                </div>
                                <div class="form-group" style="margin-top:3%">
                                    <label for="">Phone</label>
                                    <input type="text" name="phone" id="" class="form-control" value="<?php echo $phone?>">
                                </div>
                                <div class="form-group" style="margin-top:3%">
                                    <label for="">Address</label>
                                    <input type="text" name="address" id="" class="form-control" value="<?php echo $address ?>">
                                </div>
                                <div class="d-flex justify-content-center">
                                    <?php if ($update == true): ?>
                                    <button class="btn btn-success mt-3" type="submit" name="update"  >update</button>
                                    <?php else: ?>
                                    <button class="btn btn-primary mt-3" type="submit" name="submit" >Save</button>
                                    <?php endif ?>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
  </body>
</html>