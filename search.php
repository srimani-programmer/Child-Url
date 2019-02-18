<?php

$key = $_GET['key'];

$host = "localhost";
        $user = "root";
        $password = "";
        $dbname = "url";
    
        $conn = mysqli_connect($host,$user,$password,$dbname);

        $sql_query = "select * from url_info where url_key='".$key."'";

        $output = mysqli_query($conn, $sql_query) or die('Something Went Wrong'.mysqli_error($conn));

        if(mysqli_num_rows($output) == 1){
            $row = mysqli_fetch_assoc($output);
            header('Location:'.$row['url_link']);
        }else{
            echo "no url path specified";
        }



?>