<?php
include "nav.php";
$con=mysqli_connect('localhost','root','','php');
if(isset($_GET['delete_id'])){
    $delete_id= $_GET['delete_id'];
    $query="DELETE FROM `users` WHERE id='$delete_id'";
    $data =mysqli_query($con,$query);
    header('LOCATION:list.php');
  }
?>
<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.0-beta1 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

</head>

<body>

    <div class="user-data" style="margin-top:5%">
        <div class="container">
            <div class="row">
                <div class="col-3"></div>
                <div class="col-6">
                    <h3 class="text-center">User Data </h3>
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-bordered text-center fw-bold">
                                <thead class="bg-success text-white">
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Address</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center fw-bold">
                                    <?php 
                        $i=1;
                        $query="SELECT * FROM `users` WHERE 1";
                        $data = mysqli_query($con,$query);
                        while($row=mysqli_fetch_assoc($data)){ ?>
                                    <tr>
                                        <td><?php echo $i?></td>
                                        <td><?php echo $row['name']?></td>
                                        <td><?php echo $row['phone']?></td>
                                        <td><?php echo $row['address']?></td>
                                        <td>
                                            <div class="d-flex justify-content-around">
                                            <a href="list.php?delete_id=<?php echo $row['id']?>">
                                                <button class="btn btn-sm btn-danger">Delete</button>
                                            </a>
                                            <a href="home.php?edit_id=<?php echo $row['id']?>">
                                                <button class="btn btn-dark btn-sm">Edit</button>          
                                            </a>
                                            </div>
                                        </td>
                                    </tr>

                                    <?php   $i++;}
                        
                        ?>


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-3"></div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
        integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js"
        integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous">
    </script>
</body>

</html>