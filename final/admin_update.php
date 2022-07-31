<?php

@include 'config.php';

$id = $_GET['edit'];

if(isset($_POST['update_product'])){

   $recipe_name = $_POST['recipe_name'];
   $recipe_info = $_POST['recipe_info'];
   $recipe_img = $_FILES['recipe_img']['name'];
   $recipe_img_tmp_name = $_FILES['recipe_img']['tmp_name'];
   $recipe_img_folder = 'uploaded_img/'.$recipe_img;

   if(empty($recipe_name) || empty($recipe_info) || empty($recipe_img)){
      $message[] = 'please fill out all!';    
   }else{

      $update_data = "UPDATE recipes SET name='$recipe_name', recipe info='$recipe_info', image='$recipe_img'  WHERE id = '$id'";
      $upload = mysqli_query($conn, $update_data);

      if($upload){
         move_uploaded_file($recipe_img_tmp_name, $recipe_img_folder);
         header('location:admin_page.php');
      }else{
         $$message[] = 'please fill out all!'; 
      }

   }
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="./css/adminpg.css">
</head>
<body>

<?php
   if(isset($message)){
      foreach($message as $message){
         echo '<span class="message">'.$message.'</span>';
      }
   }
?>

<div class="container">


<div class="admin-product-form-container centered">

   <?php
      
      $select = mysqli_query($conn, "SELECT * FROM recipes ");
      while($row = mysqli_fetch_assoc($select)){

   ?>
   
   <form action="" method="post" enctype="multipart/form-data">
      <h3 class="title">update the product</h3>
      <input type="text" class="box" name="recipe_name" value="<?php echo $row['recipe_name']; ?>" placeholder="enter the product name">
      <input type="" min="0" class="box" name="recipe_info" value="<?php echo $row['recipe_info']; ?>" placeholder="enter the product recipe info">
      <input type="file" class="box" name="recipe_img"  accept="image/png, image/jpeg, image/jpg">
      <input type="submit" value="update product" name="update_product" class="btn">
      <a href="admin_page.php" class="btn">go back!</a>
   </form>
   


   <?php }; ?>

   

</div>

</div>

</body>
</html>