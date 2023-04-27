<?php
include "conn.php";
?>

<html>
    <head>
        <title>Guitar Rig Builder</title><link rel="stylesheet" href="w3.css">
    </head>

    <body>


        <header class="w3-container w3-red">
            <h1>Guitar Rig Builder</h1> 
        </header>

        <div class="w3-bar w3-red"> <!-- Navigation Bar-->
            <a class="w3-bar-item w3-button w3-disabled" href="index.php">Home</a>
            <a class="w3-bar-item w3-button w3-disabled" href="query_page.php">Query Page</a>
            <a class="w3-bar-item w3-button w3-disabled" href="add_gear.php">Add Gear</a>
            <a class="w3-bar-item w3-button w3-disabled" href="saved_queries.php">Saved Queries</a>
        </div>
        
        <div class="w3-container w3-red">
            <h3>Sign Up To Create You're Account</h3><!--section title-->
        </div>
        <div>
            <form class="w3-container w3-left" style="width:50%" method="post"><!--user detail inputs-->
                <br>
                <label class="w3-text-red"><h4>First Name</h4></label>
                <input class="w3-input w3-border w3-round-large" type="text" placeholder="First Name" name="user_fname" required>
                
                <label class="w3-text-red"><h4>Last Name</h4></label>
                <input class="w3-input w3-border w3-round-large" type="text" placeholder="Last Name" name="user_sname" required>
                
                <label class="w3-text-red"><h4>Username</h4></label>
                <input class="w3-input w3-border w3-round-large" type="text" placeholder="Username" name="user_username" required>
                
                <label class="w3-text-red"><h4>Email</h4></label>
                <input class="w3-input w3-border w3-round-large" type="email" placeholder="Email" name="user_email" required>
                
                <label class="w3-text-red"><h4>Password</h4></label>
                <input class="w3-input w3-border w3-round-large" type="password" placeholder="Password" name="user_password" required>
                
                <label class="w3-text-red"><h4>Confirm Password</h4></label>
                <input class="w3-input w3-border w3-round-large" type="password" placeholder="Confirm Password" name="user_verify" required>
                <br>
                <button type="submit" class="w3-btn w3-red w3-round-xxlarge" name="register" >Click To Sign Up And Be Redirected To Log In</button>
            </form> 
            <?php
            
            

            if (isset($_POST['register'])){
                // Get inputs
                $Getuser_fname = $_POST ['user_fname'];
                $Getuser_sname = $_POST ['user_sname'];
                $Getuser_username = $_POST ['user_username'];
                $Getuser_email = $_POST ['user_email'];
                $Getuser_password = $_POST ['user_password'];
                $Getuser_verify = $_POST ['user_verify'];
                $Hashed_password = password_hash($Getuser_password, PASSWORD_DEFAULT);
                //make sure inputted passwords match
                if($Getuser_password == $Getuser_verify){//sql into database
                    $sql = "INSERT INTO users (user_fname, user_sname, user_username, user_email, user_password) VALUES ('$Getuser_fname', '$Getuser_sname','$Getuser_username', '$Getuser_email', '$Hashed_password')";
                    
                    header("Location: http://localhost/grb/sign_in.php");
                    if ($conn->query($sql) !== TRUE){
                        echo "error" . $sql . "<br>" . $conn->error;

                    }
                }
                else{//dont match alert
                    ?>
                    <html>
                    <body>
                    <script>
                    alert("Passwords Don't Match")
                    </script>
                    </body>
                    </html>
                    <?php
                    }
                    
                }

            
            
            ?>
        </div><!---image--->
        <img src="joe_b.jpg" alt="Joe Bonamassa" style="width:50%" class="w3-container w3-right w3-grayscale-min w3-padding-small w3-border-0">

    </body>
    
</html>