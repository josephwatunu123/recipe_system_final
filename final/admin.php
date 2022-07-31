<?php

@include 'config.php';

if(isset($_POST['add_product'])){

	$recipe_name= $_POST['recipe_name'];
	$recipe_info= $_POST['recipe_info'];
	$prep_time= $_POST['prep_time'];
	$cooking_time= $_POST['cooking_time'];
	$servings= $_POST['servings'];
	$ingredients= $_POST['ingredients'];
	$step_1= $_POST['step_1'];
	$step_2= $_POST['step_2'];
	$step_3= $_POST['step_3'];
    $step_4= $_POST['step_4'];
	$recipe_img= $_FILES['recipe_img']['name'];
	$recipe_img_tmp_name=$_FILES['recipe_img']['tmp_name'];
	$recipe_img_folder= 'images/'.$recipe_img;

   if(empty($recipe_name) || empty($recipe_info) || empty($prep_time)){
      $message[] = 'please fill out all';
   }else{
	$insert= "INSERT INTO recipes(recipe_name,recipe_info,prep_time,cooking_time,servings,ingredients,
	step_1, step_2, step_3, step_4,	recipe_image) VALUES ('$recipe_name', '$recipe_info', '$prep_time',
	'$cooking_time', '$servings', '$ingredients', '$step_1', '$step_2', '$step_3', '$step_4', '$recipe_img')";
   }
	$upload=mysqli_query($conn, $insert);
	if($upload){
		move_uploaded_file($recipe_img_tmp_name, $recipe_img_folder);
		$message[]= 'Product added successfully';
	}else{
		$message[]='could not add to recipe currently';
	}

};

if(isset($_GET['delete'])){
   $id = $_GET['delete'];
   mysqli_query($conn, "DELETE FROM recipes WHERE recipe_id = $id");
   header('location:admin.php');
};

?>


<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>admin page</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

   <!-- custom css file link  -->
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

   <div class="admin-product-form-container">

      <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
         <h3>add a new product</h3>
         <input type="text" placeholder="enter recipe name" name="recipe_name" class="box">
         <input type="text" placeholder="enter recipe info" name="recipe_info" class="box">
         <input type="text" placeholder="prep time" name="prep_time" class="box">
         <input type="text" placeholder="cooking time" name="cooking_time" class="box">
         <input type="text" placeholder="servings" name="servings" class="box">
         <input type="text" placeholder="enter ingredients" name="ingredients" class="box">
         <input type="text" placeholder="step 1" name="step_1" class="box">
         <input type="text" placeholder="step 2" name="step_2" class="box">
         <input type="text" placeholder="step_3" name="step_3" class="box">
         <input type="text" placeholder="step_4" name="step_4" class="box">
         <input type="file" accept="image/png, image/jpeg, image/jpg" name="recipe_img" class="box">
         <input type="submit" class="btn" name="add_product" value="add product">
      </form>

   </div>

   <?php

   $select = mysqli_query($conn, "SELECT * FROM recipes");
   
   ?>
   <div class="product-display">
      <table class="product-display-table">
         <thead>
         <tr>
            <th>recipe image</th>
            <th>recipe name</th>
            <th>prep time</th>
            <th>action</th>
         </tr>
         </thead>
         <?php while($row = mysqli_fetch_assoc($select)){ ?>
         <tr>
            <td><img src="./images/<?php echo $row['recipe_image']; ?>" height="100" alt=""></td>
            <td><?php echo $row['recipe_name']; ?></td>
            <td><?php echo $row['prep_time']; ?></td>
            <td>
               <a href="admin_update.php?edit=<?php echo $row['recipe_id']; ?>" class="btn"> <i class="fas fa-edit"></i> edit </a>
               <a href="admin.php?delete=<?php echo $row['recipe_id']; ?>" class="btn"> <i class="fas fa-trash"></i> delete </a>
            </td>
         </tr>
      <?php } ?>
      </table>
   </div>

</div>

<script src="https://kit.fontawesome.com/94945b9beb.js" crossorigin="anonymous"></script>
</body>
</html>