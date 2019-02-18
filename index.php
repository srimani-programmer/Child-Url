<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="icon/png" href="logo1.png">
    <link href="https://fonts.googleapis.com/css?family=Orbitron" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Aclonica" rel="stylesheet">


    <link rel="stylesheet" href="style.css">
    <title>URL Shortner.</title>
</head>
<body class="main_body">

    <h1 class="main_heading">Url Shortner</h1>
    <br>
    <h1 class="caption">ENJOY THE EXPERIENCE WITH TINY URL API.</h1><br>
    <form action="<?php echo($_SERVER['PHP_SELF']); ?>" method="POST">  
        <center>
            <div class="search_div">
                <input type="text" name="input" class="urlsearch" placeholder="Paste a link to shorten it" autocomplete="off" required>
                <button class="but">SHORTEN</button>
            </div>      

            <h1 class="output" id="output">
            <?php
            include('backend.php');
            ?>
            </h1>
        </center>

    </form>
    
</body>
</html>