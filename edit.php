<?php

 include("function.php");
 $objCrudApp= new crudApp();
$students = $objCrudApp->display_data();

  if(isset($_GET['status'])){
       if($_GET['status']='edit'){
           $id = $_GET['id'];
           $returnData = $objCrudApp->display_dataByID($id);
       }
  }
  if(isset($_POST['usubmit'])){
     $return_massage =  $objCrudApp->update_data($_POST);
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
      <form class="form" action="" method="post" enctype="multipart/form-data">

      <?php if(isset($return_massage)){ echo $return_massage;} ?>

       <input type="text" name="ustd_name" class="form-control mb-2" value="<?php echo $returnData['std_name']; ?>">
       <input type="number" name="ustd_roll" class="form-control mb-2" value="<?php echo $returnData['std_roll']; ?>">
       <label for="image">Upload Your Image</label>
       <input type="file" name="ustd_image" class="form-control mb-2" >

       <input type="hidden" value="<?php echo $returnData['id']; ?>" name="std_id">

       <input type="submit" name="usubmit" value="Update Information" class="btn btn-info form-control">
      </form>
  </div>
 


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    -->
  </body>
</html>