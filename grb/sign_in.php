<?php
include "conn.php";
?>



<html>
    <head>
        <title>Guitar Rig Builder</title><link rel="stylesheet" href="w3.css"> <!-- Page Name -->
        <title>Sign In</title>
        
        <link rel="stylesheet" href="w3.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
        rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
        <script>
            $(document).ready(function(){
                $("#myModal").modal('show');
            });
        </script>
    </head>

    <body>
        <header class="w3-container w3-red">
            <h1>Guitar Rig Builder</h1> 
        </header>
        
        <nav class="w3-bar w3-red"> <!-- Navigation Bar-->
            <a class="w3-bar-item w3-button" href="index.php">Home</a>
            <a class="w3-bar-item w3-button" href="query_page.php">Query Page</a>
            <a class="w3-bar-item w3-button" href="add_gear.php">Add Gear</a>
            <a class="w3-bar-item w3-button" href="saved_queries.php">Saved Queries</a>
        </nav>


        <!--Login Modal-->
        <div id="myModal" class="modal fade" data-keyboard="false" data-backdrop="static">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Login To Continue</h5>
                        
                    </div>
                    <div class="modal-body">
                        <p>Login to your account to continue onto the website.</p>
                        <form method="POST">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Username" name="username" required>
                            </div>
                            <br>
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="Password" name="password" required>
                            </div>
                            <br>
                            <button type="submit" class="w3-round-xxlarge w3-btn w3-red" style="width:20%" name="login">Login</button>
                            <span class="w3-right w3-padding w3-hide-small">Don't have an account? <a href="sign_up.php">Signup</a></span>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <h2 class="w3-container">Welcome to Guitar Rig Builder</h2> <!-- Page title-->
    <br>
    <div class="w3-row-padding w3-section"><!---Query page Box-->
        <div class="w3-third">
            <div class="w3-card">
                <a href="query_page.php"><img src="search.png" alt="Rig Generator" style="width:100%" ></a>
                <div class="w3-container">
                <h3>Rig Generator</h3>
                <p>Enter your preferences and generate those rigs.</p>
                </div>
            </div>
        </div>
        
        <div class="w3-third"><!--Saved querys box-->
            <div class="w3-card">
                <a href="saved_queries.php"><img src="saved.png" alt="Saved Queries" style="width:100%" ></a>
                <div class="w3-container">
                <h3>Saved Queries</h3>
                <p>Here you can view your saved rigs and compare to other rigs you have generated.</p>
                </div>
            </div>
        </div>
        
        <div class="w3-third"><!--add gear box-->
            <div class="w3-card">
                <a href="add_gear.php"><img src="add.png" alt="Add Gear" style="width:100%" ></a>
                <div class="w3-container">
                <h3>Add Gear</h3>
                <p>A gearheads paradise where you can upload your favourate gear for inclusion in the generator.</p>
                </div>
            </div>
        </div>
    </div>
    
    </body>
</html>

<?php
if (isset($_POST['login'])){
    $Getl_username = $_POST ['username'];
    $Getl_password = $_POST['password'];
    $sql = $conn->prepare("SELECT user_id, user_password FROM `users` WHERE user_username = ?");
    $sql->bind_param('s', $Getl_username);
    $sql->execute();
    $sql->store_result();
    $sql->bind_result($user_id, $user_password);
    $result_rows = $sql->num_rows();
    if($result_rows > 0){
        while ($sql->fetch()){
            if (password_verify($Getl_password, $user_password)){
                $URL = "index.php?uid=$user_id";
                echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
                echo "<META HTTP-EQUIV='refresh' content='0;URL=" . $URL . "'>";
            }
        }
    }
}
?>