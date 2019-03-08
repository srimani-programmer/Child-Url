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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <title>URL Shortner.</title>
</head>
<body class="main_body">
    <h2 class="user_count">User Count: 15665</h2><br>
    <h1 class="main_heading animated bounce">Url Shortner</h1>
    <br>
    <h1 class="caption animated bounce">ENJOY THE EXPERIENCE WITH CHILD URL</h1><br>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method= "post" id="form">  
        <center>
            <div class="search_div animated bounce">
                <input type="url" name="input" class="urlsearch" id="result" placeholder="Paste a link to shorten it" autocomplete="off" required>

                <select name="duration" id="duration" class="duration">
                    <option value="valid for 10 minutes">10 Minutes Valid</option>
                    <option value="valid for 1 Hour">1 Hour</option>
                    <option value="valid for 1 Day">1 Day</option>
                    <option value="valid for 1 Week">1 Week</option>
                    <option value="valid for 1 Month">1 Month</option>
                    <option value="valid for 6 Months">6 Months</option>
                    <option value="valid for 1 Year">1 Year</option>
                </select><br><br><br><br>
                <button class="shorten" id="shorten">SHORTEN</button>
            </div>     
        </center>
    </form>
    <center id="center_output" class="center_output"><input type="text" class="urloutput" id="output" value="<?php include('backend.php');?>" readonly="yes"><input type="text" class="duration_value" id="duration_value" readonly="yes"><br><br><br><br>
        <button class="copy" id="copy">COPY</button></center>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script>

	    $(document).ready(function(){
  $("#copy").click(function(){
    Swal.fire({
	title:'copied!',
	text:'copied successfully',
	type:'success',
	confirmButtonText:'Ok'
})
});
});


            function copied() {
              var copyText = document.getElementById("output");
              copyText.select();
              document.execCommand("copy");
              alert("Copied the text: " + copyText.value);
          }

          var str = document.getElementById('output').value;
          if(str.length < 100){
            document.getElementById('form').style.display = "none";
            document.getElementById('center_output').style.display = "block";
            var datenow = document.getElementById('duration').value;
            if(datenow == 'valid for 10 minutes')
                document.getElementById('duration_value').value = new Date( Date.now() + 1000 * 60 * 10 );
            if(datenow == 'valid for 1 Hour')
                document.getElementById('duration_value').value = new Date( Date.now() + 1000 * 60 * 60 );
            if(datenow == 'valid for 1 Day')
                document.getElementById('duration_value').value = new Date( Date.now() + 1000 * 60 * 60 * 24 );
            if(datenow == 'valid for 1 Week')
                document.getElementById('duration_value').value = new Date( Date.now() + 1000 * 60 * 60 * 24 * 7 );
            if(datenow == 'valid for 1 Month')
                document.getElementById('duration_value').value = new Date( Date.now() + 1000 * 60 * 60 * 24 * 30 );
            if(datenow == 'valid for 6 Months')
                document.getElementById('duration_value').value = new Date( Date.now() + 1000 * 60 * 60 * 24 * 180 );
            if(datenow == 'valid for 1 Year')
                document.getElementById('duration_value').value = new Date( Date.now() + 1000 * 60 * 60 * 24 * 365 );
        }

    </script>
    
</body>
</html>
