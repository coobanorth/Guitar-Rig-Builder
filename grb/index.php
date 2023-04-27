<?php
include "conn.php";
$Getuser_id = $_GET['uid'];
?>

<html>
    <head>
        <title>Guitar Rig Builder</title><link rel="stylesheet" href="w3.css"> <!-- Page Name -->
        <title>Sign In</title>
        
        <link rel="stylesheet" href="w3.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
        rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">



    </head>

    <body>
        <header class="w3-container w3-red">
            <h1>Guitar Rig Builder</h1> 
        </header>
        
        <nav class="w3-bar w3-red"> <!-- Navigation Bar-->
            <a class="w3-bar-item w3-button" href="index.php?uid=<?php echo $Getuser_id ?>">Home</a>
            <a class="w3-bar-item w3-button" href="query_page.php?uid=<?php echo $Getuser_id ?>">Query Page</a>
            <a class="w3-bar-item w3-button" href="add_gear.php?uid=<?php echo $Getuser_id ?>">Add Gear</a>
            <a class="w3-bar-item w3-button" href="saved_queries.php?uid=<?php echo $Getuser_id ?>">Saved Queries</a>
        </nav>



        <h2 class="w3-container">Welcome to Guitar Rig Builder</h2> <!-- Page title-->
    <br>
    <div class="w3-row-padding w3-section"><!---Query page Box-->
        <div class="w3-third">
            <div class="w3-card">
                <a href="query_page.php?uid=<?php echo $Getuser_id ?>"><img src="search.png" alt="Rig Generator" style="width:100%" ></a>
                <div class="w3-container">
                <h3>Rig Generator</h3>
                <p>Enter your preferences and generate those rigs.</p>
                </div>
            </div>
        </div>
        
        <div class="w3-third"><!--Saved querys box-->
            <div class="w3-card">
                <a href="saved_queries.php?uid=<?php echo $Getuser_id ?>"><img src="saved.png" alt="Saved Queries" style="width:100%" ></a>
                <div class="w3-container">
                <h3>Saved Queries</h3>
                <p>Here you can view your saved rigs and compare to other rigs you have generated.</p>
                </div>
            </div>
        </div>
        
        <div class="w3-third"><!--add gear box-->
            <div class="w3-card">
                <a href="add_gear.php?uid=<?php echo $Getuser_id ?>"><img src="add.png" alt="Add Gear" style="width:100%" ></a>
                <div class="w3-container">
                <h3>Add Gear</h3>
                <p>A gearheads paradise where you can upload your favourate gear for inclusion in the generator.</p>
                </div>
            </div>
        </div>
    </div>
    
    </body>
</html>
