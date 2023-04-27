<html>
<head>

    <title>Javascript</title>

    <style type="text/css">
        .circle {
            width: 130px;
            height: 130px;
            border-radius: 50%;
            float: left;
            margin-right: 50px;
        }

        .rounded {
            width: 130px;
            height: 130px;
            border-radius: 25%;
            float: left;
            margin-right: 50px;
        }

        .square {
            width: 130px;
            height: 130px;
            border-radius: 0%;
            float: left;
            margin-right: 50px;
        }

        #circle {
            background-color: #196F3D;
        }

        #rounded {
            background-color: #5DADE2;
        }
    
        #square {
            background-color: #58D68D;
        }
    </style>

</head>

<body>

    <div class="circle" id="circle"></div>

    <div class="rounded" id="rounded"></div>



    <script type="text/javascript">


        document.getElementById("circle").onclick = function() {

            document.getElementById("circle").style.display = "none";

        }

        document.getElementById("rounded").onclick = function() {

            document.getElementById("rounded").style.display = "block";

        }

        document.getElementById("square").onclick = function() {

            document.getElementById("square").style.display = "block";

        }
    </script>
    <div class="square" id="square"></div>

</body>

</html>