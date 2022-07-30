<?php
    session_start();
    include_once "config.php";
    $fname= mysqli_real_escape_string($conn, $_POST['fname']);
    $lname= mysqli_real_escape_string($conn, $_POST['lname']);
    $email= mysqli_real_escape_string($conn, $_POST['email']);
    $password= mysqli_real_escape_string($conn, $_POST['password']);
    $disordername= mysqli_real_escape_string($conn, $_POST['disorder']);

    if(!empty($fname) && !empty($lname) && !empty($email) && !empty($password) ){
        //checking if user email is valid
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){ //If email is valid
            $sql= mysqli_query($conn, "SELECT email FROM users WHERE email='{$email}'");
            if(mysqli_num_rows($sql)>0){//if email already exists
                echo "$email - already exists!";
            }else{
                //lets check if user uploaded file or no
                if(isset($_FILES['image'])){//if file is uploaded
                    $img_name = $_FILES['image']['name'];//getting user uploaded img name;
                    $tmp_name= $_FILES['image']['tmp_name']; //this temporary name is used to save/move file in our folder

                    //lets exploade image and get the last extension like jpg, png
                    $img_explode= explode('.',$img_name);
                    $img_ext = end($img_explode); //here we get the extension of an user uploaded img file

                    $extensions = ['png','jpeg', 'jpg']; //these are some valid img extensions we have stored in the array
                    if(in_array($img_ext, $extensions)===true){//if the user uploaded a valid img file
                        $time= time(); // this will return to us current time because when you upload user img to our folder we rename user file with current time
                                        //so all the image files will have a unique name 
                        //lets move the user uploaded img to our particular folder
                        $new_img_name = $time.$img_name;

                        if(move_uploaded_file($tmp_name, "images/".$new_img_name)){//if user upload img move it to our folder successfully
                            $status= "Active now"; //once user signed up then his status will be active now 
                            $random_id = rand(time(), 10000000); //creating random id for usrs

                            //let's insert all user data inside table
                            $sql2 = mysqli_query($conn, "INSERT INTO users (unique_id, firstname, lastname, email, password, img, status)
                                        VALUES ({$random_id},'{$fname}','{$lname}','{$email}', '{$password}', '{$new_img_name}', '{$status}')");
                                if($sql2){ //if these data are inserted successfully
                                    $sql3 = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
                                    if(mysqli_num_rows($sql3)>0){
                                        $row= mysqli_fetch_assoc($sql3);
                                        $_SESSION['unique_id']= $row['unique_id']; //using this session we need user unique_id in other php file
                                        echo "success";
                                    }

                                }else{
                                    echo "something went wrong";
                                }
                        }
                                      
                    }
                    else{
                        echo "please select an image file -jpg, jpeg or png";
                    }

                }else{
                    echo "please  select an image from files";
                }
            }
        }
        else{
            echo "$email is not a valid email";
        }
    }else{
        echo "All input field are required";
    }

?>