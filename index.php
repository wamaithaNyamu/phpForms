<?php
include('connect.php');
// define variables and set to empty values
$nameErr = $emailErr  = $websiteErr = "";
$name = $email  = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }
    
  if (empty($_POST["website"])) {
    $website = "";
  } else {
    $website = test_input($_POST["website"]);
    // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
      $websiteErr = "Invalid URL";
    }
  }



 
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
if(empty($nameErr) && empty($emailErr) && empty($websiteErr)){
  $SELECT = "SELECT email From usiuinvestt Where email = ? Limit 1";
  $INSERT = "INSERT Into usiuinvestt(name, email, website,idea) values(?,?,?,?)";
  // prepare statement
  $stmt = $conn->prepare($SELECT);
  $stmt->bind_param("s", $email);
  $stmt->execute();
  $stmt->bind_result($email);
  $stmt->store_result();
  $rnum = $stmt->num_rows;

  if($rnum==0){
      $stmt -> close();

      $stmt = $conn-> prepare($INSERT);
      $stmt -> bind_param("ssss", $name, $email, $website, $idea);
      $name = $_REQUEST['name'];
      $email = $_REQUEST['email'];
      $website = $_REQUEST['website'];
      $idea = $_REQUEST['idea'];

      $stmt->execute();
     
       echo " 
  

        alert('Your idea was posted successfully');

        window.location.href='investors.php';

        </script>
       ";

  }
  // if email is in db
  else{
    if(empty($email)){
      return;
    }else{
        echo " 
        <script type='text/javascript'>
        alert('Oops! This email has already been used to register an idea. ');
      
        window.location.href='register.php';

        </script>
       ";

    }
 }
  $stmt->close();
  $conn->close();
}
?>


<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</body>
</html>
