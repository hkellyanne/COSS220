<!DOCTYPE html>
<html>
        <head>
        <title>Log In</title>
      <link href="../css/style.css" rel="stylesheet">
        </head>
    <body>
        
    <a href="../index.html">
    <img src="../images/home.png" alt="go back" style="position:absolute; TOP:35px; LEFT:50px"; height="35px" /></a>   

    
<?php
define('TITLE', 'Login');
include('templates/header.html');

print '<h2>Login Form</h2> <p>Users who are logged in are alpacas.</p>';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    if ((!empty($_POST['email'])) && (!empty($_POST['password']))){
        
    $dbc = mysqli_connect('localhost', 'khallcol', '@Lbcc2015', 'khallcol_REGISTRATION');
    //mysqli_select_db(, $dbc);
        
    if($dbc->connect_error){
        die("Connection failed: " . $conn->connect_error);
    }
    
    
    $query = mysqli_query($dbc, "SELECT * FROM USER WHERE email = '$email' AND password = '$password'");
    $numrows = mysqli_num_rows($query);
	$row = mysqli_fetch_array($query);
        
   if($numrows == 1) {
            /*print '<p>Welcome fellow alpaca! <br>
            <img src="../images/alpacafriends.jpg" alt="alpaca friends" />
            </p>
            <br>
            <a href="newsfeed.php">Continue to next page</a>';*/
			session_start();
			$_SESSION['user_id'] = $row['user_id'];
			
			header("Location: newsfeed.php");
			exit();
			
        }else{
            print '<p>Invalid Login</p>';
        }
    }else{
            print '<p>Please make sure you enter both an email address and a password!</p>';
        }
        mysqli_close($dbc);     
       
        
} else{ print'<form action="handle_login2.php" method="post">
<p>Email Address: <input type="text" name="email" size="20"/></p>
<p>Password: <input type="password" name="password" size="20"/></p>
<p><input type="submit" name="submit" value="Log In!" /></p><br> <a href="registration_form2.php">Not an alpaca? Register here!</a><br>
<a href="admin_login.php">I am an Administrator</a>
</form>';
    }



?>




 </body>
    
    
</html>