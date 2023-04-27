<?php
include "conn.php";
$Getuser_id = $_GET['uid'];
?>

<html>
    <head>
        <title>Saved Queries</title><link rel="stylesheet" href="w3.css">
    </head>

    <body>
        <header class="w3-container w3-red">
            <h1>Guitar Rig Builder</h1> 
        </header>

        <div class="w3-bar w3-red"> <!-- Navigation Bar-->
            <a class="w3-bar-item w3-button" href="index.php?uid=<?php echo $Getuser_id ?>">Home</a>
            <a class="w3-bar-item w3-button" href="query_page.php?uid=<?php echo $Getuser_id ?>">Query Page</a>
            <a class="w3-bar-item w3-button" href="add_gear.php?uid=<?php echo $Getuser_id ?>">Add Gear</a>
            <a class="w3-bar-item w3-button" href="saved_queries.php?uid=<?php echo $Getuser_id ?>">Saved Queries</a>
        </div>
</html>

<?php
//show saved queries
$sql = "SELECT * FROM queries WHERE user_id = $Getuser_id";
$result = mysqli_query($conn, $sql);

while($row = mysqli_fetch_assoc($result)) {
    //fetch guitar details
    $guitar = $row['guitar_id'];
    $guitar_sql = "SELECT * FROM guitars WHERE guitar_id = $guitar";
    $g_result = mysqli_query($conn, $guitar_sql);
    $grow = mysqli_fetch_assoc($g_result);

    //fetch amp details
    $amp = $row['amp_id'];
    $amp_sql = "SELECT * FROM amps WHERE amp_id = $amp";
    $a_result = mysqli_query($conn, $amp_sql);
    $arow = mysqli_fetch_assoc($a_result);

    //fetch pedal details
    $pedal = $row['pedal_id'];
    $pedal_sql = "SELECT * FROM pedals WHERE pedal_id = $pedal";
    $p_result = mysqli_query($conn, $pedal_sql);
    $prow = mysqli_fetch_assoc($p_result);

    echo "<br>";
    echo "<div class: w3-container style='width:50%' class='w3-card w3-padding w3-grey'> Your Budget: £" . $row["query_budget"]." <br>Your Genre: " . $row["query_genre"]." <br>Gigging: " . $row["query_gigging"]." <br><br>Guitar:  ". $grow['guitar_brand'] ." ". $grow['guitar_model']."<br>Guitar Price: £". $grow['guitar_price']." <br><br>Amp:  ". $arow['amp_brand'] ." ". $arow['amp_model']."<br>Amp Price: £". $arow['amp_price']." <br><br>Pedal:  ". $prow['pedal_brand'] ." ". $prow['pedal_model']."<br>Pedal Price: £". $prow['pedal_price']."</div>";
    
}
?>