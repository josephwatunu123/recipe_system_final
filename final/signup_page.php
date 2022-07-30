<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LanChat</title>
    <link rel="stylesheet" href="./css/signupg.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awsome/5.15.2/css/all.min.css"/>
    <script src="https://kit.fontawesome.com/94945b9beb.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="wrapper">
        <section class="form sign-up">
            <header>LanChat</header>
            <form action="#" method="POST"  enctype="multipart/form-data">
                <div class="error-txt"></div>
                <div class="name-details">
                    <div class="field input">
                        <label>First name</label>
                        <input type="text" name="fname" placeholder="First Name" required>
                    </div> 
                    <div class="field input">
                        <label>Last Name</label>
                        <input type="text" name="lname" placeholder="Last Name" required>
                    </div>
                    <div class="field input">
                        <label>Email Address</label>
                        <input type="text" name="email" placeholder="Email" required>
                    </div>
                    <div class="field input">
                        <label>Password</label>
                        <input type="password" name="password" placeholder="Password" required>
                        <i class="fas fa-eye"></i>
                    </div>
                    <div class="field input">
                        <label>Your digestive disorder</label>
                        <input type="text" name="disorder" placeholder="Disorder" required>
                    </div>
                    <div class="field">
                        <label>Profile Photo</label>
                        <input type="file" name="image" required>
                    </div>
                    <div class="field button">
                        <input type="submit" name="submit" value="continue">
                    </div>
                </div>
            </form>
            <div class="link">Alreayd a user? <a href="#">login</a></div>
        </section>
    </div>
    <script src="./js/pass-show-hide.js"></script>
    <script src="signup.js"></script>
</body>
</html>
