


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invest In Usiu</title>
    <link rel="stylesheet" href="investor.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css?family=Jaldi&display=swap" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css?family=Caveat&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Special+Elite&display=swap" rel="stylesheet"> 
  
</head>
<body>
  <div id="invest">
  <img src="invest.png"></img>
 <h1>INVEST IN A COMMUNITY OF GREAT MINDS</h1>

  </div>

    <div class="wrapper">
    <div class="output">
    <?php 
                  include ('connect.php');

                  $query = mysqli_query($conn, "SELECT * FROM usiuinvestt")
                    or die (mysqli_error($conn));

                  while ($row = mysqli_fetch_array($query)) {

                  ?> 
          <div class="outputCard">
            
            <i class="fas fa-user-alt"></i> 	&nbsp; <?php echo $row['name'] ?> <br>
            <i class="fas fa-envelope"></i> 	&nbsp;<?php echo $row['email']?> <br>
            <i class="fab fa-firefox-browser"></i> 	&nbsp;<?php echo $row['website']?>  <br>
        
             
              <blockquote>
              <?php echo $row['idea']?>
          
              </blockquote>

            </div>
            <?php } ?>


       
            </div>

         </div>


    <div class="signup">
    <i class="fas fa-plus-circle"></i>
    <a href="register.php">    SIGN-UP HERE
    </a>
     </div>
  
</body>
</html>
