<!DOCTYPE html>
<html>
        <head>
            <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
        <title>Admin Edit</title>
      <link href="../css/style.css" rel="stylesheet">
        </head>
    <body>
                       <a href="admin_page.php">
            <img src="../images/backbutton.png" alt="go back" style="position:absolute; TOP:35px; LEFT:50px"; height="35px" /></a>   
            <a href="handle_login2.php"  style="position:absolute; TOP:35px; RIGHT:100px">logout</a>
        <h1>Update a User</h1>
<?php
    $dbc = mysql_connect('localhost', 'khallcol', '@Lbcc2015');
    mysql_select_db('khallcol_REGISTRATION', $dbc);

if (isset($_GET['id']) && is_numeric($_GET['id'])){
    $query = "SELECT email, password, username, photo, biography FROM USER WHERE user_id={$_GET['id']}";
    
        if ($r = mysql_query($query, $dbc)) {
        $row = mysql_fetch_array($r);
            
        print '<form action="edit_user.php" method="post">
        <p> E-mail: <input type="text" name="email" size="20" maxsize="100" value="' .  
        htmlentities($row['email']) . '" /></p>
        <p> Password: <input type="text" name="password" size="20" value="' . htmlentities($row['password']) .  
        '"/></p>
        <p> Name: <input type="text" name="name" size="20" value="' . htmlentities($row['username']) . '"/></p>
        <p>Biography: <textarea name="autobio" cols="40" rows="5">' . htmlentities($row['biography']) . '</textarea></p>
        <input type="hidden" name="id" value="' . $_GET['id'] . '" />
        <input type="submit" name="submit" value="Update" />
        </form>';
        
        } else {
            print '<p style="color: red;"> Could not retrieve blog enry because:<br />' . mysql_error($dbc) . '.</p><p>The query being run was: ' . $query . '</p>';
        }
} elseif(isset($_POST['id']) && is_numeric($_POST['id'])){
    $problem = FALSE;
    if(!empty($_POST['autobio']) && !empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['password'])){
        $biography = mysql_real_escape_string(trim(strip_tags($_POST['autobio'])), $dbc);
        $email = mysql_real_escape_string(trim(strip_tags($_POST['email'])), $dbc);
        $password = mysql_real_escape_string(trim(strip_tags($_POST['password'])), $dbc);
        $name = mysql_real_escape_string(trim(strip_tags($_POST['name'])), $dbc);
    } else {
        print '<p style="color: red;">Please complete the form</p>';
        $problem = TRUE;
    }

    
    if (!$problem){

        $query = "UPDATE USER SET biography='$biography', email='$email', password='$password', username='$name' WHERE user_id={$_POST['id']}";
       $r = mysql_query($query, $dbc);
       
       if(mysql_affected_rows($dbc) == 1){
           print '<p>The User has been updated</p>';
       } else {
           print '<p style="color: red;">Could not update User because:<br />' . mysql_error($dbc) . '</p><p>The query being run was: ' . $query . '</p>';
       }
    }
    } else {
        print '<p style="color: red;">This page has been accessed in error.</p>';
    }

       mysql_close($dbc);
?>
    </body>
</html>
       
       
       
    
                                                                    