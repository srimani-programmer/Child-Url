    <?php
    
    $url = $_POST['input'];
    date_default_timezone_set('Asia/Calcutta');
    $timelimit = $_POST['duration'];
    $start = date("Y-m-d H:i:s");
    if($timelimit=='valid for 10 minutes')
        $timelimit = date('Y-m-d H:i:s',strtotime('+10 minutes',strtotime($start)));
    else if($timelimit=='valid for 1 Hour')
        $timelimit = date('Y-m-d H:i:s',strtotime('+1 hour',strtotime($start)));
    else if($timelimit=='valid for 1 Day')
        $timelimit = date('Y-m-d H:i:s',strtotime('+1 day',strtotime($start)));
    else if($timelimit=='valid for 1 Week')
        $timelimit = date('Y-m-d H:i:s',strtotime('+1 week',strtotime($start)));
    else if($timelimit=='valid for 1 Month')
        $timelimit = date('Y-m-d H:i:s',strtotime('+1 month',strtotime($start)));
    else if($timelimit=='valid for 6 Months')
        $timelimit = date('Y-m-d H:i:s',strtotime('+6 months',strtotime($start)));
    else if($timelimit=='valid for 1 Year')
        $timelimit = date('Y-m-d H:i:s',strtotime('+1 year',strtotime($start)));

    
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

                $sql_update = "update url_info set url_timelimit = '".$timelimit."' where url_key = '".$row['url_key']."'";
                
                if(mysqli_query($conn, $sql_update)){
                    echo("http://localhost/ChildUrl/search/".$row['url_key']);
                }else{
                    die('Something Went Wrong'.mysqli_error($conn));
                }

            }else{  // new url will be generated.
                $random  = substr(md5($url.mt_rand()),0,10);    // Randm key generator
                $sql_query = "insert into url_info (url_key, url_link, url_timelimit) values ('".$random."','".$url."','".$timelimit."')";
                
                if(mysqli_query($conn, $sql_query)){
                    echo("http://localhost/ChildUrl/search/".$random);
                }else{
                    die('Something Went Wrong'.mysqli_error($conn));
                }
            }
        }
        ?>
