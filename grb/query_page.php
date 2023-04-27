<?php
include "conn.php";
$Getuser_id = $_GET['uid'];
?>

<html>
    <head>
        <title>Query Page</title><link rel="stylesheet" href="w3.css"> <!-- Page Name -->
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
        <br>
        
    <form method="get">
        <div class="w3-container"> <!--1st details box-->
            <div style=width:50% class="w3-card w3-padding">
                <input type=hidden name=uid value="<?php echo $Getuser_id ?>">
                <label class="w3-text-black"><h4>Price Limit - Don't Include £ Sign</h4></label>
                <input class="w3-input w3-border w3-round-large" type="text" placeholder="Price Limit" name='price'>
                <label class="w3-text-black"><h4>Do you plan on gigging with your rig?</h4></label>
                <input type='hidden' name='gigging' value='0'>
                <input type="checkbox" class="w3-check" name='gigging' value='1'>
                <span class="checkmark"></span>
                <br>
                <br>
            </div>
            <br>

            <div style=width:50% class="w3-card w3-padding"><!---genre radioboxes-->

                    <h4>What genre do you want to play</h4>
                    <p>
                    
                    <input class="w3-radio" type="radio" name="genre" value="blues" checked>
                    <label>Blues</label></p>
                    <p>
                    <input class="w3-radio" type="radio" name="genre" value="country">
                    <label>Country</label></p>
                    <p>
                    <input class="w3-radio" type="radio" name="genre" value="funk">
                    <label>Funk</label></p>
                    <p>
                    <input class="w3-radio" type="radio" name="genre" value="jazz">
                    <label>Jazz</label></p>
                    <p>
                    <input class="w3-radio" type="radio" name="genre" value="metal">
                    <label>Metal</label></p>
                    <p>
                    <input class="w3-radio" type="radio" name="genre" value="pop">
                    <label>Pop</label></p>
                    <p>
                    <input class="w3-radio" type="radio" name="genre" value="rock">
                    <label>Rock</label></p>
                
            </div>
                <br>
                <br> <!--generate rig button-->
                <button class="w3-button w3-round-xxlarge w3-red" type='submit' name='generate_rig'>Generate Rig!</button>
                <br>
                <br>
        </div>
    </form>
        </html>

<?php
if (isset($_GET['generate_rig'])){
    // Get inputs
    $Getprice = $_GET ['price'];
    $Getgigging = $_GET ['gigging'];
    $Getgenre = $_GET ['genre'];

    if($Getgigging == '1' && $Getprice > '1500'){
        //price variables
        $guitar_budget = $Getprice * 0.33;
        $amp_budget = $Getprice * 0.53;
        $pedal_budget = $Getprice * 0.14;

        //prints price per catagory
        echo"<html><div class=' w3-container w3-red w3-padding'>Guitar Budget: £$guitar_budget <br>Amp Budget: £$amp_budget <br>Pedal Budget: £$pedal_budget <br></div><br><br>";

        //fetches results that match the inputted values
        $guitar_sql = "SELECT * FROM guitars WHERE guitar_price < $guitar_budget AND guitar_$Getgenre = '1' ORDER BY guitar_ranking DESC";
        $gresult = mysqli_query($conn, $guitar_sql);

        $amp_sql = "SELECT * FROM amps WHERE amp_price < $amp_budget AND amp_$Getgenre = '1' ORDER BY amp_ranking DESC";
        $aresult = mysqli_query($conn, $amp_sql);

        $pedal_sql = "SELECT * FROM pedals WHERE pedal_price < $pedal_budget AND pedal_$Getgenre = '1' ORDER BY pedal_ranking DESC";
        $presult = mysqli_query($conn, $pedal_sql);
        
        $gnumber = mysqli_num_rows($gresult);
        $anumber = mysqli_num_rows($aresult);
        $pnumber = mysqli_num_rows($presult);

        if ($gnumber > 0 && $anumber > 0 && $pnumber > 0) {
            // output data of each row
            echo"<table><form method='post'><tr><th>Guitar</th></tr>";
            while($grow = mysqli_fetch_assoc($gresult)) {
                    echo "<tr><td><br><div class: w3-container><div style='width:100%' class='w3-card w3-padding w3-yellow'>Guitar: " . $grow["guitar_brand"]. " " . $grow["guitar_model"] . "<br>Price: £" . $grow["guitar_price"]. "<input class='w3-radio w3-right' type='radio' name='g_select' value='" . $grow['guitar_id'] . "'></div></div></td></tr>";
            }
            echo"<tr><th>Amp</th></tr>";
            while($arow = mysqli_fetch_assoc($aresult)) {
                    echo "<tr><tr><td><br><div class: w3-container><div style='width:100%' class='w3-card w3-padding w3-green'>Amp: " . $arow["amp_brand"]. " " . $arow["amp_model"] . "<br>Price: £" . $arow["amp_price"]. "<input class='w3-radio w3-right' type='radio' name='a_select' value='" . $arow['amp_id'] . "'></div></div></td></tr></tr>";
            }
            echo"<tr><th>Pedal</th></tr>";
            while($prow = mysqli_fetch_assoc($presult)) {
                    echo "<tr><tr><tr><td><br><div class: w3-container><div style='width:100%' class='w3-card w3-padding w3-blue '>Pedal: " . $prow["pedal_brand"]. " " . $prow["pedal_model"] . "<br>Price: £" . $prow["pedal_price"]. "<input class='w3-radio w3-right' type='radio' name='p_select' value='" . $prow['pedal_id'] . "'></div></div></td></tr></tr></tr>";
            }
            echo"</table><button type='submit' class='w3-button w3-round-xxlarge w3-red' name='save_rig'>Save Rig</button></form>";
        
        
        }
    
    }

    

    if($Getgigging == '1' && $Getprice <= '1500'){
        //price variables
        $guitar_budget = $Getprice * 0.40;
        $amp_budget = $Getprice * 0.60;
        $pedal_budget = $Getprice * 0;

        //prints price per catagory
        echo"<html><div class=' w3-container w3-red w3-padding'>Guitar Budget: £$guitar_budget <br>Amp Budget: £$amp_budget <br>Pedal Budget: £$pedal_budget <br></div><br><br>";

        //fetches results that match the inputted values
        $guitar_sql = "SELECT * FROM guitars WHERE guitar_price < $guitar_budget AND guitar_$Getgenre = '1' ORDER BY guitar_ranking DESC";
        $gresult = mysqli_query($conn, $guitar_sql);

        $amp_sql = "SELECT * FROM amps WHERE amp_price < $amp_budget AND amp_$Getgenre = '1' ORDER BY amp_ranking DESC";
        $aresult = mysqli_query($conn, $amp_sql);

        $pedal_sql = "SELECT * FROM pedals WHERE pedal_price = $pedal_budget AND pedal_$Getgenre = '1' ORDER BY pedal_ranking DESC";
        $presult = mysqli_query($conn, $pedal_sql);
        
        $gnumber = mysqli_num_rows($gresult);
        $anumber = mysqli_num_rows($aresult);
        $pnumber = mysqli_num_rows($presult);
        

        if ($gnumber > 0 && $anumber > 0 && $pnumber > 0) {
            // output data of each row
            echo"<table><form method='post'><tr><th>Guitar</th></tr>";
            while($grow = mysqli_fetch_assoc($gresult)) {
                    echo "<tr><td><br><div class: w3-container><div style='width:100%' class='w3-card w3-padding w3-yellow'>Guitar: " . $grow["guitar_brand"]. " " . $grow["guitar_model"] . "<br>Price: £" . $grow["guitar_price"]. "<input class='w3-radio w3-right' type='radio' name='g_select' value='" . $grow['guitar_id'] . "'></div></div></td></tr>";
            }
            echo"<tr><th>Amp</th></tr>";
            while($arow = mysqli_fetch_assoc($aresult)) {
                    echo "<tr><tr><td><br><div class: w3-container><div style='width:100%' class='w3-card w3-padding w3-green'>Amp: " . $arow["amp_brand"]. " " . $arow["amp_model"] . "<br>Price: £" . $arow["amp_price"]. "<input class='w3-radio w3-right' type='radio' name='a_select' value='" . $arow['amp_id'] . "'></div></div></td></tr></tr>";
            }
            echo"<tr><th>Pedal</th></tr>";
            while($prow = mysqli_fetch_assoc($presult)) {
                    echo "<tr><tr><tr><td><br><div class: w3-container><div style='width:100%' class='w3-card w3-padding w3-blue '>Pedal: " . $prow["pedal_brand"]. " " . $prow["pedal_model"] . "<br>Price: £" . $prow["pedal_price"]. "<input class='w3-radio w3-right' type='radio' name='p_select' value='" . $prow['pedal_id'] . "'></div></div></td></tr></tr></tr>";
            }
            echo"</table><button type='submit' class='w3-button w3-round-xxlarge w3-red' name='save_rig'>Save Rig</button></form>";
        
        
        }
    }


    if($Getgigging == '0' && $Getprice > '1500'){
        //price variables
        $guitar_budget = $Getprice * 0.53;
        $amp_budget = $Getprice * 0.30;
        $pedal_budget = $Getprice * 0.17;

        //prints price per catagory
        echo"<html><div class=' w3-container w3-red w3-padding'>Guitar Budget: £$guitar_budget <br>Amp Budget: £$amp_budget <br>Pedal Budget: £$pedal_budget <br></div><br><br>";

        //fetches results that match the inputted values
        $guitar_sql = "SELECT * FROM guitars WHERE guitar_price < $guitar_budget AND guitar_$Getgenre = '1' ORDER BY guitar_ranking DESC";
        $gresult = mysqli_query($conn, $guitar_sql);

        $amp_sql = "SELECT * FROM amps WHERE amp_price < $amp_budget AND amp_$Getgenre = '1' ORDER BY amp_ranking DESC";
        $aresult = mysqli_query($conn, $amp_sql);

        $pedal_sql = "SELECT * FROM pedals WHERE pedal_price < $pedal_budget AND pedal_$Getgenre = '1' ORDER BY pedal_ranking DESC";
        $presult = mysqli_query($conn, $pedal_sql);
        
        $gnumber = mysqli_num_rows($gresult);
        $anumber = mysqli_num_rows($aresult);
        $pnumber = mysqli_num_rows($presult);
        

        if ($gnumber > 0 && $anumber > 0 && $pnumber > 0) {
            // output data of each row
            echo"<table><form method='post'><tr><th>Guitar</th></tr>";
            while($grow = mysqli_fetch_assoc($gresult)) {
                    echo "<tr><td><br><div class: w3-container><div style='width:100%' class='w3-card w3-padding w3-yellow'>Guitar: " . $grow["guitar_brand"]. " " . $grow["guitar_model"] . "<br>Price: £" . $grow["guitar_price"]. "<input class='w3-radio w3-right' type='radio' name='g_select' value='" . $grow['guitar_id'] . "'></div></div></td></tr>";
            }
            echo"<tr><th>Amp</th></tr>";
            while($arow = mysqli_fetch_assoc($aresult)) {
                    echo "<tr><tr><td><br><div class: w3-container><div style='width:100%' class='w3-card w3-padding w3-green'>Amp: " . $arow["amp_brand"]. " " . $arow["amp_model"] . "<br>Price: £" . $arow["amp_price"]. "<input class='w3-radio w3-right' type='radio' name='a_select' value='" . $arow['amp_id'] . "'></div></div></td></tr></tr>";
            }
            echo"<tr><th>Pedal</th></tr>";
            while($prow = mysqli_fetch_assoc($presult)) {
                    echo "<tr><tr><tr><td><br><div class: w3-container><div style='width:100%' class='w3-card w3-padding w3-blue '>Pedal: " . $prow["pedal_brand"]. " " . $prow["pedal_model"] . "<br>Price: £" . $prow["pedal_price"]. "<input class='w3-radio w3-right' type='radio' name='p_select' value='" . $prow['pedal_id'] . "'></div></div></td></tr></tr></tr>";
            }
            echo"</table><button type='submit' class='w3-button w3-round-xxlarge w3-red' name='save_rig'>Save Rig</button></form>";
        
        
        }
        }
    

    if($Getgigging == '0' && $Getprice <= '1500'){
        //price variables
        $guitar_budget = $Getprice * 0.70;
        $amp_budget = $Getprice * 0.30;
        $pedal_budget = $Getprice * 0;

        //prints price per catagory
        echo"<html><div class=' w3-container w3-red w3-padding'>Guitar Budget: £$guitar_budget <br>Amp Budget: £$amp_budget <br>Pedal Budget: £$pedal_budget <br></div><br><br>";

        //fetches results that match the inputted values
        $guitar_sql = "SELECT * FROM guitars WHERE guitar_price < $guitar_budget AND guitar_$Getgenre = '1' ORDER BY guitar_ranking DESC";
        $gresult = mysqli_query($conn, $guitar_sql);

        $amp_sql = "SELECT * FROM amps WHERE amp_price < $amp_budget AND amp_$Getgenre = '1' ORDER BY amp_ranking DESC";
        $aresult = mysqli_query($conn, $amp_sql);

        $pedal_sql = "SELECT * FROM pedals WHERE pedal_price = $pedal_budget AND pedal_$Getgenre = '1' ORDER BY pedal_ranking DESC";
        $presult = mysqli_query($conn, $pedal_sql);
        
        $gnumber = mysqli_num_rows($gresult);
        $anumber = mysqli_num_rows($aresult);
        $pnumber = mysqli_num_rows($presult);

        

        if ($gnumber > 0 && $anumber > 0 && $pnumber > 0) {
            // output data of each row
            echo"<table><form method='post'><tr><th>Guitar</th></tr>";
            while($grow = mysqli_fetch_assoc($gresult)) {
                    echo "<tr><td><br><div class: w3-container><div style='width:100%' class='w3-card w3-padding w3-yellow'>Guitar: " . $grow["guitar_brand"]. " " . $grow["guitar_model"] . "<br>Price: £" . $grow["guitar_price"]. "<input class='w3-radio w3-right' type='radio' name='g_select' value='" . $grow['guitar_id'] . "'></div></div></td></tr>";
            }
            echo"<tr><th>Amp</th></tr>";
            while($arow = mysqli_fetch_assoc($aresult)) {
                    echo "<tr><tr><td><br><div class: w3-container><div style='width:100%' class='w3-card w3-padding w3-green'>Amp: " . $arow["amp_brand"]. " " . $arow["amp_model"] . "<br>Price: £" . $arow["amp_price"]. "<input class='w3-radio w3-right' type='radio' name='a_select' value='" . $arow['amp_id'] . "'></div></div></td></tr></tr>";
            }
            echo"<tr><th>Pedal</th></tr>";
            while($prow = mysqli_fetch_assoc($presult)) {
                    echo "<tr><tr><tr><td><br><div class: w3-container><div style='width:100%' class='w3-card w3-padding w3-blue '>Pedal: " . $prow["pedal_brand"]. " " . $prow["pedal_model"] . "<br>Price: £" . $prow["pedal_price"]. "<input class='w3-radio w3-right' type='radio' name='p_select' value='" . $prow['pedal_id'] . "'></div></div></td></tr></tr></tr>";
            }
            echo"</table><button type='submit' class='w3-button w3-round-xxlarge w3-red' name='save_rig'>Save Rig</button></form>";
        
        
        }
    }

}

//puts results into query table
if (isset($_POST["save_rig"])){
    //saves query data to database
    $Getg_id = $_POST ['g_select'];
    $Getprice = $_GET ['price'];
    $Getgigging = $_GET ['gigging'];
    $Getgenre = $_GET ['genre'];
    $Geta_id = $_POST ['a_select'];
    $Getp_id = $_POST ['p_select'];

    //USER ADD POINTS
    //get points
    $UserPoints_sql = "SELECT user_points FROM users WHERE user_id = $Getuser_id";
    $result = mysqli_query($conn,$UserPoints_sql);
    while($row = mysqli_fetch_array($result)) {
        $points = $row['user_points'];
    }
    //add 1
    $points_1 = $points + 1;
    
    //return to database
    $return_sql = "UPDATE users SET user_points = $points_1 WHERE user_id = $Getuser_id";
    if ($conn->query($return_sql) !== TRUE){
        echo "error " . $return_sql . "<br>" . $conn->error;
    }

    //GUITAR ADD POINTS
        //get points
        $Guitar_ranking_sql = "SELECT guitar_ranking FROM guitars WHERE guitar_id = $Getg_id";
        $gr_result = mysqli_query($conn,$Guitar_ranking_sql);
        while($row = mysqli_fetch_array($gr_result)) {
            $gpoints = $row['guitar_ranking'];
        }
        //add 1
        $points_g = $gpoints + 1;
        
        //return to database
        $return_g_sql = "UPDATE guitars SET guitar_ranking = $points_g WHERE guitar_id = $Getg_id";
        if ($conn->query($return_g_sql) !== TRUE){
            echo "error " . $return_g_sql . "<br>" . $conn->error;
        }

        //AMP ADD POINTS
        //get points
        $amp_ranking_sql = "SELECT amp_ranking FROM amps WHERE amp_id = $Geta_id";
        $ar_result = mysqli_query($conn,$amp_ranking_sql);
        while($row = mysqli_fetch_array($ar_result)) {
            $apoints = $row['amp_ranking'];
        }
        //add 1
        $points_a = $apoints + 1;
        
        //return to database
        $return_a_sql = "UPDATE amps SET amp_ranking = $points_a WHERE amp_id = $Geta_id";
        if ($conn->query($return_a_sql) !== TRUE){
            echo "error " . $return_a_sql . "<br>" . $conn->error;
        }

                //PEDAL ADD POINTS
        //get points
        $pedal_ranking_sql = "SELECT pedal_ranking FROM pedals WHERE pedal_id = $Getp_id";
        $ap_result = mysqli_query($conn,$pedal_ranking_sql);
        while($row = mysqli_fetch_array($pr_result)) {
            $ppoints = $row['pedal_ranking'];
        }
        //add 1
        $points_p = $ppoints + 1;
        
        //return to database
        $return_p_sql = "UPDATE pedals SET pedal_ranking = $points_p WHERE pedal_id = $Getp_id";
        if ($conn->query($return_p_sql) !== TRUE){
            echo "error " . $return_p_sql . "<br>" . $conn->error;
        }


    $sql = "INSERT INTO queries (user_id, query_budget, query_genre, query_gigging, guitar_id, amp_id, pedal_id) VALUES ('$Getuser_id', '$Getprice', '$Getgenre', '$Getgigging', '$Getg_id', '$Geta_id', '$Getp_id')";
    
    if ($conn->query($sql) !== TRUE){
        echo "error" . $sql . "<br>" . $conn->error;
    }}

?>