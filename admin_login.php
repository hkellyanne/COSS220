<!DOCTYPE html>
<html>
        <head>
            <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
        <title>Admin Log in</title>
      <link href="../css/style.css" rel="stylesheet">
        </head>
    <body>
               <a href="handle_login2.php">
            <img src="../images/backbutton.png" alt="go back" style="position:absolute; TOP:35px; LEFT:50px"; height="35px" /></a>   
        
<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    

    if ((!empty($_POST['email'])) && (!empty($_POST['password']))){
    if((strtolower($_POST['email']) == 'khall@lbcc.edu') && ($_POST['password'] == 'admin')){
            header("Location: admin_page.php");
			exit();

    } else{
        print '<p>Access Denied</p>';
    }
} else{
        print '<p>Please make sure you enter both an email address and a password!</p>';
    }
               
} else{ print'<form action="admin_login.php" method="post">
<p>Email Address: <input type="text" name="email" size="20"/></p>
<p>Password: <input type="password" name="password" size="20"/></p>
<p><input type="submit" name="submit" value="Log In!" /></p><br>
</form>';
    }



?>
        
        
        
    </body>
</html>

