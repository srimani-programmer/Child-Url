<?php

    $url = $_POST['input'];

        if(isset($url)){    // checks wheather the data is present or not

            // database connections
            
            $host = "localhost";
            $user = "root";
            $password = "";
            $dbname = "url";
        
            $conn = mysqli_connect($host,$user,$password,$dbname);

            $sql_search_query = "select * from url_info where url_link = '".$url."'";

            $serach_query = mysqli_query($conn,$sql_search_query);
            
            if(mysqli_num_rows($serach_query) == 1){    // If already existed in the database
                $row = mysqli_fetch_assoc($serach_query);
                echo("http://localhost/MyownShortner/search.php?key=".$row['url_key']);

            }else{  // new url will be generated.
                $random  = substr(md5($url.mt_rand()),0,10);    // Randm key generator
                $sql_query = "insert into url_info (url_key, url_link) values ('".$random."','".$url."')";
        
                if(mysqli_query($conn, $sql_query)){
                    echo("http://localhost/MyownShortner/search.php?key=".$random);
                }else{
                    die('Something Went Wrong'.mysqli_error($conn));
                }
            }
        }
?>

<script>
    var str = document.getElementById('output').innerHTML;
          
    if (str.length<300) {

        document.getElementById('output').style.display='block';
    }
       
</script>
<?php

?>

