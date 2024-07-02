<?php
include_once("connections/connection.php");
$con = connection();

// for Edit.php 
$id = $_GET['id'];

$select = "SELECT * FROM students WHERE id = '$id' ";
$checks = $con->query($select) or die ($con->error);
$rowcheck = $checks->fetch_assoc();
$totalcheck = $checks -> num_rows;


if(isset($_POST['update'])){
    $first_name = $_POST['first_name'];
    $middle_name = $_POST['middle_name'];
    $last_name = $_POST['last_name'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];

    $sqlus = "UPDATE students SET first_name = '$first_name' , middle_name = '$middle_name' , last_name = '$last_name', gender = '$gender', email = '$email' WHERE id = '$id' ";
    $con->query($sqlus) or die ($con->error); 
    header('location:crud.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Information System</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.css">
    <link rel="stylesheet" href="fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="fontawesome/css/regular.min.css">
    <link rel="stylesheet" href="fontawesome/css/solid.min.css">
    <link rel="stylesheet" href="fontawesome/css/svg-with-js.css">
    <link rel="stylesheet" href="responsive/responsive.css">
</head>
<body>

<div class="container">
    <h1 class="text-center mt-5">Students Information</h1>
    <table class="table table-bordered">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">First Name</th>
        <th scope="col">Middle Name</th>
        <th scope="col">Last Name</th>
        <th scope="col">Email</th>
        <th scope="col">Gender</th>
        </tr>
    </thead>
    <tbody>
<?php if($totalcheck > 0){
    do{
  ?>
  <form action="" method="post">
        <tr>
        <th scope="row"><?php echo $rowcheck['id']; ?></th>
        <td><input class="form-control" name= "first_name" type="text" value="<?php echo $rowcheck['first_name']; ?>"></td>
        <td><input class="form-control" name="middle_name" type="text" value="<?php echo $rowcheck['middle_name']; ?>"></td>
        <td><input class="form-control" name="last_name" type="text" value="<?php echo $rowcheck['last_name']; ?>"></td>
        <td><input class="form-control" name="email" type="text" value="<?php echo $rowcheck['email']; ?>"></td>
        <td><select name="gender" id="" class="form-control">
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select></td>
        <td>  <button type="submit" name="update" class="btn btn-success">Update</button>
        </td>
        </tr>
    </form>

<?php }while($rowcheck = $checks->fetch_assoc());

    }?>
    </tbody>
</table>
</div>


    
<script src="jqury/jquery.min.js"></script>
      <script src="popper/popper.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="jqury/jquery.min.js"></script>
    <script src="fontawesome/js/all.js"></script>
    <script src="fontawesome/js/fontawesome.min.js"></script>
    <script src="fontawesome/js/all.min.js"></script>
    <script src="fontawesome/js/brands.js"></script>
    <script src="fontawesome/js/brands.min.js"></script>
    
    <script src="js/carosel.js"></script>
    <script src="js/modal.js"></script>
    <script src="js/script.js"></script>
     
      <script>
          const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]')
  const popoverList = [...popoverTriggerList].map(popoverTriggerEl => new bootstrap.Popover(popoverTriggerEl))
      </script>
      <!-- ///for tooltip -->
      <script>const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
        </script>
        <!-- ///for tooltip closed-->
  </body>
  </html>