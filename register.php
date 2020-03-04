<?php
include('index.php')
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form Validation</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
  <link href="https://fonts.googleapis.com/css?family=Jaldi&display=swap" rel="stylesheet"> 
  <link href="https://fonts.googleapis.com/css?family=Caveat&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Special+Elite&display=swap" rel="stylesheet"> 
</head>
<body>
  <div class="blur"></div>
  <div class="wrapper">
    <div class="formwrapper">

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  

        <div class="myForm">
          <h1>USIU INVEST</h1>

          <label for="name">Name:</label><span name="nameErr" class="error">* <?php echo $nameErr;?></span>
          <br>
    
          <input type="text" class="input" placeholder="Your name" name="name" >
          <br>
          <label for="email">Email Address:</label> <span name="emailErr" class="error">* <?php echo $emailErr;?></span>
          <br>
    
          <input type="text"class="input"placeholder="A valid email address" name="email" >
          <br>
          <label for="website">Website Url:</label> <span name="websiteErr"class="error">*<?php echo $websiteErr;?></span>
          <br>
    
          <input type="text"class="input" placeholder="Your website." name="website" >
          <br>
          Your idea:
          <br>

          <textarea for="comment" rows="10" cols="50" class="textarea"placeholder="Tell investors about your idea" name="idea" ></textarea>
          
          <br>
      
          <input type="submit" value="Submit" class="submit" id="submit" onClick="theAlert()">
          <p>Looking to invest? Go to the <a href="investors.php">investors panel</a></p>
      </div>
      
     
    </form>
  </div>

  <div class="output">
    <div id="ideainvest">
    <img src="idea.png" ></img>

<h1>SHARE YOUR IDEA WITH PEOPLE WHO CARE ABOUT YOU.</h1>
<h1>DRAW  INSPIRATION FROM OTHER STUDENTS.</h1>

    </div>

    <?php 
                  include ('connect.php');

                  $query = mysqli_query($conn, "SELECT * FROM usiuinvestt")
                    or die (mysqli_error($conn));

                  while ($output = mysqli_fetch_array($query)) {

                  ?> 
          <div class="outputCard">
            
            <i class="fas fa-user-alt"></i> 	&nbsp; <?php echo $output['name'] ?> <br>
                     
              <blockquote>
              <?php echo $output['idea']?>
          
              </blockquote>

            </div>
            <?php } ?>


       
            </div>

  
  </div>
</div>


</div>

</body>
</html>