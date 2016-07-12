<!DOCTYPE html>
<html>
        <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>Admin</title>
      <link href="../css/style.css" rel="stylesheet">
        </head>
    <body>
    <a href="handle_login2.php"  style="position:absolute; TOP:35px; RIGHT:100px">logout</a>

<?php
//define('TITLE', 'View all Users');
print '<h2>All Users</h2>';
print'<a href="add_entry.php"> + Add a User</a><br />';
$dbc = mysql_connect('localhost', 'khallcol', '@Lbcc2015');
mysql_select_db('khallcol_REGISTRATION', $dbc);

//    if($dbc->connect_error){
//        die("Connection failed: " . $conn->connect_error);
//    }


$query = 'SELECT user_id, email, password, photo FROM USER ORDER BY user_id ASC';
$row = mysql_num_rows($query);

if($r = mysql_query($query, $dbc)){
    while ($row = mysql_fetch_array($r)){
        print "<div><blockquote>{$row['user_id']}</blockquote>- {$row['email']}</blockquote>- {$row['password']}</blockquote>- {$row['photo']}</blockquote>- {$row['biography']}</blockquote>- {$row['registration_date']}\n";
        print"<p><b>User Admin: </b><a href=\"edit_user.php?id={$row['user_id']}\">Edit</a> <-> <a href=\"delete_user.php?id={$row['user_id']}\">Delete</a></p></div>\n";
        print "__________________________________________________";
    }
} else {
    print'<p class="error">Could not retrieve the data because:<br />' . mysql_error($dbc) . '.</><p>The query being run was : ' . $query . '</p>';
}
        
        
mysql_close($dbc);


?>
    </body>
