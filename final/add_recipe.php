<?php

include_once "config.php";

if(isset($_POST['add_recipe'])){
    
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

	$insert= "INSERT INTO recipes(reicpe_name,recipe_info,prep_time,cooking_time,servings,ingredients,
	step_1, step_2, step_3, step_4,	recipe_image) VALUES ('$recipe_name', '$recipe_info', '$prep_time',
	'$cooking_time', '$servings', '$ingredients', '$step_1', '$step_2', '$step_3', '$step_4', '$recipe_img')";

	$upload=mysqli_query($conn, $insert);
	if($upload){
		move_uploaded_file($recipe_img_tmp_name, $recipe_img_folder);
		$message[]= 'Product added successfully';
	}else{
		$message[]='could not add to recipe currently';
	}
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/addingrecipe.css">
    <title>Document</title>
    
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
	<!-- code here -->
	<div class="card">
		<div class="card-image">	
			<h2 class="card-heading">
                Add A Smile
				<small> To someones face through the plate</small>
			</h2>
		</div>
		<div class="pass_message">

		</div>
		<form class="card-form" action="#" method="POST"  enctype="multipart/form-data">
			<div class="input">
				<input type="text" name="recipe_name" class="input-field" required/>
				<label class="input-label">Food Name</label>
			</div>
				<div class="input">
				<input type="text" name="recipe_info" class="input-field" required/>
				<label class="input-label">Recipe Info</label>
			</div>
            <div class="input">
				<input type="text" name="prep_time" class="input-field" required/>
				<label class="input-label">Prep Time</label>
			</div>
            <div class="input">
				<input type="text" name="cooking_time" class="input-field" required/>
				<label class="input-label">Cook Time</label>
			</div>
            <div class="input">
				<input type="text" name="servings" class="input-field" required/>
				<label class="input-label">Servings</label>
			</div>
            <div class="input">
				<input type="text" name="ingredients" class="input-field" required/>
				<label class="input-label">Ingredients</label>
			</div>
            <h4>Preparation Steps</h4>
				<div class="input">
				<input type="text" name="step_1" class="input-field" required/>
				<label class="input-label">Step 1</label>
			</div>
            <div class="input">
				<input type="text" name="step_2" class="input-field" required/>
				<label class="input-label">Step 2</label>
			</div>
            <div class="input">
				<input type="text" name="step_3" class="input-field" required/>
				<label class="input-label">Step 3</label>
			</div>
            <div class="input">
				<input type="text" name="step_4" class="input-field" required/>
				<label class="input-label">Step 4</label>
			</div>
            <div class="input">
				<input type="file" name="recipe_img" class="input-field" required/>
				<label class="input-label">upload photo</label>
			</div>
			<div class="action">
				<button name="add_recipe" class="action-button" style="cursor:pointer">Submit Recipe</button>
			</div>
		</form>
	</div>
</div>

</body>
</html>