<!DOCTYPE html>
<html>
        <head>
            <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
        <title>Register</title>
      <link href="../css/style.css" rel="stylesheet">
        </head>
    <body>
               <a href="handle_login2.php">
            <img src="../images/backbutton.png" alt="go back" style="position:absolute; TOP:35px; LEFT:50px"; height="35px" /></a>   
    </body>
    
<?php
define('TITLE', 'Register');
include('templates/header.html');

$firstnameErr = $lastnameErr = $emailErr = $passwordErr = $confirmErr = "";
$firstname = $lastname = $email = $password = $confirm = "";
$dir = '..users/';
$file = $dir . 'users.txt';
$nopic = '<img src="../images/nopic.png" alt="no picture" height="100px" />';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $problem = FALSE;
    
    $dbc = mysql_connect('localhost', 'khallcol', '@Lbcc2015');
    mysql_select_db('khallcol_REGISTRATION', $dbc);
    
  if (empty($_POST['firstname'])) {
    $problem = TRUE;
    $firstnameErr = "Name is required";      
  } else {
    $firstname = strtolower(test_input($_POST['firstname']));
      
  }

    
  if (empty($_POST['lastname'])) {
      $problem = TRUE;
    $lastnameErr = "Last Name is required";    
  } else {
    $lastname = test_input($_POST['lastname']);
  }
    

  if (empty($_POST['email'])) {
      $problem = TRUE;
    $emailErr = "E-mail is required"; 
  } else {
    $email = test_input($_POST['email']);

  }


  if (empty($_POST['password1'])) {
      $problem = TRUE;
    $passwordErr = 'Password is required';  
  } else {
    $password = test_input($_POST['password1']);
  }

  if (empty($_POST['password2'])) {
      $problem = TRUE;
    $confirmErr = "Confirm Password is required";   
  } else {
    $confirm = test_input($_POST['password2']);

  }
    
    if($_POST['password1'] != $_POST['password2']){
        $problem = TRUE;
        print '<p class="error">Your password and confirmed password did not match!</p>';
    }

              
    if(!$problem){
        $query = "INSERT INTO USER (user_id, email, password, username, photo, registration_date) VALUES (0, '$email', '$password', '$firstname', '$nopic', NOW())";
        if(@mysql_query($query, $dbc)){
            $time = date("h:i:sa");
            print"Congratulations! you are now $firstname $lastname the alpaca! </br>
            an email confirmation will be sent to $email. You are now an alpaca as of $time";
            print'  <a href="handle_login2.php" >login now!</a>';
            $_POST = array();
        }

        if(is_writable($file)){
            $subdir = time() . rand(0,4596);
            $data2 = $_POST['email'] . "\t" . md5(trim($_POST['password1'])) . "\t" . $subdir. PHP_EOL;
            
            file_put_contents($file, $data2, FILE_APPEND | LOCK_EX);
            
            mkdir ($dir . $subdir);

        }


    } else{
            print'<p class="error"> Sorry! You are unable to become an alpaca.</p>';
        }
            mysql_close($dbc);
    
}
    
function test_input($data) {
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
return $data;
}


print'<h2> Registration Form</h2>
<p>Register here to become an alpaca</p>';
        
print'<style type="text/css" media="screen">
.error{color: red;}
</style>';


?>
<form action="registration_form2.php" method="post">
    
    
    
    
    <p>First Name: <input type="text" name="firstname" size="20" value="<?php if (isset($_POST['firstname'])) { print htmlspecialchars($_POST['firstname']);} ?>"/>
        <span class="error">* <?php echo $firstnameErr;?></span></p>
    
    
    <p>Last Name: <input type="text" name="lastname" size="20" value="<?php if (isset($_POST['lastname'])) { print htmlspecialchars($_POST['lastname']);} ?>"/>
        <span class="error">* <?php echo $lastnameErr;?></span></p>
    
    <p>E-mail: <input type="text" name="email" size="20" value="<?php if (isset($_POST['email'])) { print htmlspecialchars($_POST['email']);} ?>"/>
        <span class="error">* <?php echo $emailErr;?></span></p>
    
    <p>Password: <input type="password" name="password1" size="20" value="<?php if (isset($_POST['password1'])) { print htmlspecialchars($_POST['pasword1']);} ?>"/>
        <span class="error">* <?php echo $passwordErr;?></span></p>
    
    
    <p>Confirm Password: <input type="password" name="password2" size="20" value="<?php if (isset($_POST['password2'])) { print htmlspecialchars($_POST['password2']);} ?>"/>
        <span class="error">* <?php echo $confirmErr;?></span></p>
    

    


    
<p><input type="submit" name="submit" value="Register" /></p>
    
</form>

<?php include('templates/footer.html'); ?>

        
</html>