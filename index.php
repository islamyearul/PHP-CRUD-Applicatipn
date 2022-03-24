<?php

 include("function.php");
 $objCrudApp= new crudApp();
 
 if(isset($_POST['submit'])){
   $return_massage = $objCrudApp->add_data(($_POST));
 }
  
$students = $objCrudApp->display_data();

   if(isset($_GET['status'])){

     if($_GET['status']='delete'){

       $delete_id = $_GET['id'];

       $rel_mass = $objCrudApp->deleteDATA($delete_id);
     }
   }
?>




<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Crud Application</title>
  </head>
  <body>

  <div class="container my-4 p-4 shadow">
      <h2 class="align-center"><a href="index.php">Islam It Database</a></h2>
      <?php if(isset($rel_mass)){ echo $rel_mass; } ?>
      <form class="form" action="" method="post" enctype="multipart/form-data">

      <?php if(isset($return_massage)){ echo $return_massage;} ?>

       <input type="text" name="std_name" class="form-control mb-2" placeholder="Enter Your Name">
       <input type="number" name="std_roll" class="form-control mb-2" placeholder="Enter Your Roll">
       <label for="image">Upload Your Image</label>
       <input type="file" name="std_image" class="form-control mb-2" >
       <input type="submit" name="submit" value="Add Information" class="btn btn-info form-control">
      </form>
  </div>
  <div class="container my-4 p-4 shadow">
      <table class="table">
         <thead>
         <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Roll</th>
              <th>Image</th>
              <th>Action</th>
          </tr>
         </thead>
         <tbody>

         <?php while($student=mysqli_fetch_assoc($students)){ ?>

             <tr>
                 <td><?php echo $student['id']; ?></td>
                 <td><?php echo $student['std_name']; ?></td>
                 <td><?php echo $student['std_roll']; ?></td>
                 <td><img style="height: 100px;" src="upload/<?php echo $student['std_image']; ?>" alt=""></td> 
                 <td>
                     <a href="edit.php?status=edit&&id=<?php echo $student['id']; ?>" class="btn btn-success">Edit</a>
                     <a onclick="return confirm('Are you Sure')" href="?status=delete&&id=<?php echo $student['id']; ?>" class="btn btn-primary">Delete</a>
                 </td>
             </tr>

             <?php   } ?>
         </tbody>
      </table>
  </div>










    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
  </body>
</html>