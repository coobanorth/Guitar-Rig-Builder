<?php
include "conn.php";
$Getuser_id = $_GET['uid'];
?>

<html>
    <head>
        <title>Add Gear</title><link rel="stylesheet" href="w3.css">
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
        <div Class="w3-container w3-red w3-padding-16" id="NoPoints" style="display: block;">
        You do not have enough points to be able to add gear yet. Gain points by making and saving queries.
        </div>
        
        <div id="AddGear" style="display: none;">
        <!--Gear Select Dropdown-->
        <div Class="w3-container w3-red w3-padding-16"><h2>Select the catagory of gear you would like to add:</h2>
        <div class="w3-dropdown-click">
            <button onclick="myFunctionOne()" class="w3-button w3-red w3-border">Select Catagory</button>
            <div id="Dropdown" class="w3-dropdown-content w3-bar-block w3-border">
                <a href="#" class="w3-bar-item w3-button" onclick="myFunctionTwo()">Guitar</a>
                <a href="#" class="w3-bar-item w3-button" onclick="myFunctionThree()">Amp</a>
                <a href="#" class="w3-bar-item w3-button" onclick="myFunctionFour()">Pedal</a>
            </div>
        </div>
        </div>

        <script>/*shows dropdown menu*/
            function myFunctionOne() {
                var x = document.getElementById("Dropdown");
                if (x.className.indexOf("w3-show") == -1) { 
                x.className += " w3-show";
                } else {
                x.className = x.className.replace(" w3-show", "");
                }
            }
        </script>
<br>
<br>
<br>
<br>    <!--Add gear div-->
        <div id="GuitarDiv" class="w3-container" style="display: none;">



            <!--guitars basic details-->
            <h3><b>Enter the guitars details below to add it to the database</b></h3>
            <form method="post">
                <div style=width:50% class="w3-card w3-padding">
                    <label class="w3-text-black"><h4>Guitar Make</h4></label>
                    <input class="w3-input w3-border w3-round-large" type="text" placeholder="Guitar Make" name="g_make" required>
                    <label class="w3-text-black"><h4>Guitar Model</h4></label>
                    <input class="w3-input w3-border w3-round-large" type="text" placeholder="Guitar Model" name="g_model" required>
                    <label class="w3-text-black"><h4>Guitar Price - Don't Include £ Sign</h4></label>
                    <input class="w3-input w3-border w3-round-large" type="text" placeholder="Guitar Price" name="g_price" required>
                </div>
                <br>
                <!--genre checkboxes-->
                <div style=width:50% class="w3-card w3-padding">
                    <h3 class="w3-text-black">Check all the genres this guitar applies for</h3>
                    <label class="w3-container">Blues
                    <input type="hidden" name="g_blues" value='0'/>
                    <input type="checkbox" class="w3-check" name='g_blues' value='1'/>
                    <span class="checkmark"></span>
                    </label>
                    
                    <label class="w3-container">Country
                    <input type="hidden" name="g_country" value='0'/>
                    <input type="checkbox" class="w3-check" name='g_country' value='1'>
                    <span class="checkmark"></span>
                    </label>
                    
                    <label class="w3-container">Funk
                    <input type="hidden" name="g_funk" value='0'/>
                    <input type="checkbox" class="w3-check" name='g_funk' value='1'>
                    <span class="checkmark"></span>
                    </label>
                    
                    <label class="w3-container">Jazz
                    <input type="hidden" name="g_jazz" value='0'/>
                    <input type="checkbox" class="w3-check" name='g_jazz' value='1'>
                    <span class="checkmark"></span>
                    </label>
                    
                    <label class="w3-container">Metal
                    <input type="hidden" name="g_metal" value='0'/>
                    <input type="checkbox" class="w3-check" name='g_metal' value='1'>
                    <span class="checkmark"></span>
                    </label>
                    
                    <label class="w3-container ">Pop
                    <input type="hidden" name="g_pop" value='0'/>
                    <input type="checkbox" class="w3-check" name='g_pop' value='1'>
                    <span class="checkmark"></span>
                    </label>
                    
                    <label class="w3-container">Rock
                    <input type="hidden" name="g_rock" value='0'/>
                    <input type="checkbox" class="w3-check" name='g_rock' value='1'>
                    <span class="checkmark"></span>
                    </label>
                </div>
                <br>
                <br><!--submit button-->
                <button class="w3-button w3-round-xxlarge w3-red" type="submit" name="g_submit">Submit</button>
                <br>
                <br>
            </div>
            </form>
</html>
<?php
if (isset($_POST['g_submit'])){
    // Get inputs
    $Getg_make = $_POST ['g_make'];
    $Getg_model = $_POST ['g_model'];
    $Getg_price = $_POST['g_price'];

    $Getg_blues = $_POST['g_blues'];
    $Getg_country = $_POST['g_country'];
    $Getg_funk = $_POST['g_funk'];
    $Getg_jazz = $_POST['g_jazz'];
    $Getg_matal = $_POST ['g_metal'];
    $Getg_pop = $_POST ['g_pop'];
    $Getg_rock = $_POST ['g_rock'];

    $sql = "INSERT INTO guitars (guitar_brand, guitar_model, guitar_price, guitar_blues, guitar_country, guitar_funk, guitar_jazz, guitar_metal, guitar_pop, guitar_rock) VALUES ('$Getg_make', '$Getg_model','$Getg_price', '$Getg_blues', '$Getg_country', '$Getg_funk', '$Getg_jazz', '$Getg_matal', '$Getg_pop', '$Getg_rock')";
    
    if ($conn->query($sql) !== TRUE) {
        echo "error" . $sql . "<br>" . $conn->error;
    }
    else{
        ?>
        <html>
        <script>
            alert("Guitar Added")
        </script>
        </html>
        <?php
        
    }}
    
?>
<html>
        
        <form method="post">
        <!--Add amp div-->
        <div id="AmpDiv" class="w3-container" style="display: none;">
            <!--amps basic details-->
            <h3><b>Enter the amps details below to add it to the database</b></h3>
            <div style=width:50% class="w3-card w3-padding">
                <label class="w3-text-black"><h4>Amp Make</h4></label>
                <input class="w3-input w3-border w3-round-large" type="text" placeholder="Amp Make" name="a_make">
                <label class="w3-text-black"><h4>Amp Model</h4></label>
                <input class="w3-input w3-border w3-round-large" type="text" placeholder="Amp Model" name="a_model">
                <label class="w3-text-black"><h4>Amp Price - Don't Include £ Sign</h4></label>
                <input class="w3-input w3-border w3-round-large" type="text" placeholder="Amp Price" name="a_price">
            </div>
                <br>
            <!--genre checkbox-->
            <div style=width:50% class="w3-card w3-padding">
                <h3 class="w3-text-black">Check all the genres this amp applies for</h3>


                <label class="w3-container">Blues
                <input type="hidden" name="a_blues" value='0'/>
                <input type="checkbox" class="w3-check" name='a_blues' value='1'>
                <span class="checkmark"></span>
                </label>
                
                <label class="w3-container">Country
                <input type="hidden" name="a_country" value='0'/>
                <input type="checkbox" class="w3-check" name="a_country" value='1'>
                <span class="checkmark"></span>
                </label>
                
                <label class="w3-container">Funk
                <input type="hidden" name="a_funk" value='0'/>
                <input type="checkbox" class="w3-check" name="a_funk" value='1'>
                <span class="checkmark"></span>
                </label>
                
                <label class="w3-container">Jazz
                <input type="hidden" name="a_jazz" value='0'/>
                <input type="checkbox" class="w3-check" name="a_jazz" value='1'>
                <span class="checkmark"></span>
                </label>
                
                <label class="w3-container">Metal
                <input type="hidden" name="a_metal" value='0'/>
                <input type="checkbox" class="w3-check" name="a_metal" value='1'>
                <span class="checkmark"></span>
                </label>

                <label class="w3-container ">Pop
                <input type="hidden" name="a_pop" value='0'/>
                <input type="checkbox" class="w3-check" name="a_pop" value='1'>
                <span class="checkmark"></span>
                </label>

                <label class="w3-container">Rock
                <input type="hidden" name="a_rock" value='0'/>
                <input type="checkbox" class="w3-check" name="a_rock" value='1'> 
                <span class="checkmark"></span>
                </label>
            </div>
            <br>
            <br><!--submit button-->
                <button class="w3-button w3-round-xxlarge w3-red" type='submit' name=a_submit>Submit</button>
            <br>
            <br>
            </div>
            </div>
        </form>
</html>
<?php
if (isset($_POST['a_submit'])){
    // Get inputs
    $Geta_make = $_POST ['a_make'];
    $Geta_model = $_POST ['a_model'];
    $Geta_price = $_POST['a_price'];

    $Geta_blues = $_POST['a_blues'];
    $Geta_country = $_POST['a_country'];
    $Geta_funk = $_POST['a_funk'];
    $Geta_jazz = $_POST['a_jazz'];
    $Geta_matal = $_POST ['a_metal'];
    $Geta_pop = $_POST ['a_pop'];
    $Geta_rock = $_POST ['a_rock'];

    $sql = "INSERT INTO amps (amp_brand, amp_model, amp_price, amp_blues, amp_country, amp_funk, amp_jazz, amp_metal, amp_pop, amp_rock) VALUES ('$Geta_make', '$Geta_model','$Geta_price', '$Geta_blues', '$Geta_country', '$Geta_funk', '$Geta_jazz', '$Geta_matal', '$Geta_pop', '$Geta_rock')";
    
    if ($conn->query($sql) !== TRUE) {
        echo "error" . $sql . "<br>" . $conn->error;
    }
    else{
        ?>
        <html>
        <script>
            alert("Amp Added")
        </script>
        </html>
        <?php
        
    }}
    
?>

<html>
        <form method='post'>
            <!--Add pedal div-->
            <div id="PedalDiv" class="w3-container" style="display: none;">
                <h3><b>Enter the pedals details below to add it to the database</b></h3>
                <div style=width:50% class="w3-card w3-padding">
                <label class="w3-text-black"><h4>Pedal Make</h4></label>
                <input class="w3-input w3-border w3-round-large" type="text" placeholder="Pedal Make" name='p_make'>
                <label class="w3-text-black"><h4>Pedal Model</h4></label>
                <input class="w3-input w3-border w3-round-large" type="text" placeholder="Pedal Model" name='p_model'>
                <label class="w3-text-black"><h4>Pedal Price - Don't Include £ Sign</h4></label>
                <input class="w3-input w3-border w3-round-large" type="text" placeholder="Pedal Price" name='p_price'>
            </div>
                <br>
            <!--genre checkboxes-->
            <div style=width:50% class="w3-card w3-padding">
                <h3 class="w3-text-black">Check all the genres this pedal applies for</h3>
                
                <label class="w3-container">Blues
                <input type="hidden" name="p_blues" value='0'/>
                <input type="checkbox" class="w3-check" name='p_blues' value='1'>
                <span class="checkmark"></span>
                </label>
                
                <label class="w3-container">Country
                <input type="hidden" name="p_country" value='0'/>
                <input type="checkbox" class="w3-check" name='p_country' value='1'>
                <span class="checkmark"></span>
                </label>
                
                <label class="w3-container">Funk
                <input type="hidden" name="p_funk" value='0'/>
                <input type="checkbox" class="w3-check" name='p_funk' value='1'>
                <span class="checkmark"></span>
                </label>
                
                <label class="w3-container">Jazz
                <input type="hidden" name="p_jazz" value='0'/>
                <input type="checkbox" class="w3-check" name='p_jazz' value='1'>
                <span class="checkmark"></span>
                </label>
                
                <label class="w3-container">Metal
                <input type="hidden" name="p_metal" value='0'/>
                <input type="checkbox" class="w3-check" name='p_metal' value='1'>
                <span class="checkmark"></span>
                </label>

                <label class="w3-container ">Pop
                <input type="hidden" name="p_pop" value='0'/>
                <input type="checkbox" class="w3-check" name='p_pop' value='1'>
                <span class="checkmark"></span>
                </label>

                <label class="w3-container">Rock
                <input type="hidden" name="p_rock" value='0'/>
                <input type="checkbox" class="w3-check" name='p_rock' value='1'>
                <span class="checkmark"></span>
                </label>
            </div>
                <br>
            <!--pedal type radio boxes-->
            <div style=width:50% class="w3-card w3-padding">
                    <h4>What type of pedal is it</h4>
                    <p>
                    <input class="w3-radio" type="radio" name="p_type" value="overdrive" checked>
                    <label>Overdrive</label></p>
                    <p>
                    <input class="w3-radio" type="radio" name="p_type" value="time_based">
                    <label>Time-based</label></p>
                    <p>
                    <input class="w3-radio" type="radio" name="p_type" value="modulation">
                    <label>Modulation</label></p>
                    <p>
                    <input class="w3-radio" type="radio" name="p_type" value="boost">
                    <label>Boost</label></p>
                    <p>
                    <input class="w3-radio" type="radio" name="p_type" value="wah">
                    <label>Wah</label></p>
                    <p>
                    <input class="w3-radio" type="radio" name="p_type" value="other">
                    <label>Other</label></p>
                
            </div>
            <br>
            <br><!--submit button-->
            <button class="w3-button w3-round-xxlarge w3-red" type='submit' name=p_submit>Submit</button>
            <br>
            <br>
        </div>
        </div>
    </form>
</div>
    
</html>
    <?php
    if (isset($_POST['p_submit'])){
        // Get inputs
        $Getp_make = $_POST ['p_make'];
        $Getp_model = $_POST ['p_model'];
        $Getp_price = $_POST['p_price'];

        $Getp_blues = $_POST['p_blues'];
        $Getp_country = $_POST['p_country'];
        $Getp_funk = $_POST['p_funk'];
        $Getp_jazz = $_POST['p_jazz'];
        $Getp_matal = $_POST ['p_metal'];
        $Getp_pop = $_POST ['p_pop'];
        $Getp_rock = $_POST ['p_rock'];

        $Getp_type = $_POST['p_type'];
        


        $sql = "INSERT INTO pedals (pedal_brand, pedal_model, pedal_type, pedal_price, pedal_blues, pedal_country, pedal_funk, pedal_jazz, pedal_metal, pedal_pop, pedal_rock) VALUES ('$Getp_make', '$Getp_model', '$Getp_type', '$Getp_price', '$Getp_blues', '$Getp_country', '$Getp_funk', '$Getp_jazz', '$Getp_matal', '$Getp_pop', '$Getp_rock')";
        
        if ($conn->query($sql) !== TRUE) {
            echo "error" . $sql . "<br>" . $conn->error;
        }
        else{
            ?>
            <html>
            <script>
                alert("Pedal Added")
            </script>
            </html>
            <?php
            
        }}
        
    ?>

    <html>
        <script>/*guitar div on other 2 off*/
        function myFunctionTwo() {
        var a = document.getElementById("PedalDiv");
        var b = document.getElementById("AmpDiv");
        var x = document.getElementById("GuitarDiv");
        if (x.style.display === "none") {
            x.style.display = "block";
            a.style.display = "none";
            b.style.display = "none";
        } else {
            x.style.display = "none";
        }
        }
        /*amp div on other 2 off*/
        function myFunctionThree() {
        var a = document.getElementById("GuitarDiv");
        var b = document.getElementById("PedalDiv");
        var x = document.getElementById("AmpDiv");
        if (x.style.display === "none") {
            x.style.display = "block";
            a.style.display = "none";
            b.style.display = "none";
        } else {
            x.style.display = "none";
        }
        }
        /*pedal div on other 2 off*/
        function myFunctionFour() {
        var a = document.getElementById("GuitarDiv");
        var b = document.getElementById("AmpDiv");
        var x = document.getElementById("PedalDiv");
        if (x.style.display === "none") {
            x.style.display = "block";
            a.style.display = "none";
            b.style.display = "none";
        } else {
            x.style.display = "none";
        }
        }
        </script>

        

<?php //not enough points - collect point data from user table
    $UserPoints_sql = "SELECT user_points FROM users WHERE user_id = $Getuser_id";
    $result = mysqli_query($conn,$UserPoints_sql);
    while($row = mysqli_fetch_array($result)) {
        $points = $row['user_points'];
    }
        ?>

<script>/*not enough points div control*/
        var UserPoints = <?php echo json_encode($points); ?>;
        var a = document.getElementById("AddGear");
        var b = document.getElementById("NoPoints");
        
        if (UserPoints > 7) {
            a.style.display = "block";
            b.style.display = "none";
        } 
        
        else {
            b.style.display = "block";
            a.style.display = "none";
        }
        
        </script>
        </html>