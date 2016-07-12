<!DOCTYPE html PUBLI-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
        <head>
            <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
        <title>Admin Delete</title>
      <link href="../css/style.css" rel="stylesheet">
        </head>
    <body>
                    <a href="handle_login2.php"  style="position:absolute; TOP:35px; RIGHT:100px">logout</a>
            <a href="admin_page.php">
            <img src="../images/backbutton.png" alt="go back" style="position:absolute; TOP:35px; LEFT:50px"; height="35px" /></a>   
        <h1>Delete a User</h1>
<?php
    $dbc = mysql_connect('localhost', 'khallcol', '@Lbcc2015');
    mysql_select_db('khallcol_REGISTRATION', $dbc);

if (isset($_GET['id']) && is_numeric($_GET['id'])){
    $query = "SELECT email, password, username, photo, biography FROM USER WHERE user_id={$_GET['id']}";
    
    if ($r = mysql_query($query, $dbc)) {
        $row = mysql_fetch_array($r);
        
        print '<form action="delete_user.php" method="post">
        <p>Are you sure you want to delete this entry?</p>
        <p><h3>' . $row['user_id'] . '</h3>' . $row['email'] . '<br />
        <input type="hidden" name="id" value="' . $_GET['id'] . '" />
        <input type="submit" name="submit" value="Delete" /></p>
        </form>';
    } else {
        print '<p style="color: red;">Could not retrieve the user because:</br>' . mysql_error($dbc) . '</p><p>The query being run was: ' . $query . '</p>';
        }
} elseif (isset($_POST['id']) && is_numeric($_POST['id'])){
    $query = "DELETE FROM USER WHERE user_id={$_POST['id']} LIMIT 1";
    $r = mysql_query($query, $dbc);
    
    if (mysql_affected_rows($dbc) == 1){
        print '<p>The user has been deleted.</p>';
    } else {
        print '<p style="color: red;">Could not retrieve the user because:</br>' . mysql_error($dbc) . '</p><p>The query being run was: ' . $query . '</p>';
        }
    
    
}else {
        print '<p style="color: red;">This page has been accessed in error.</p>';
    }
    mysql_close($dbc);
?>
    </body>
</html>