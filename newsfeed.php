<?php session_start(); ?>

<!DOCTYPE html>
<html>
        <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>Newsfeed</title>
      <link href="../css/style.css" rel="stylesheet">
        </head>
    <body>
    <a href="logout.php"  style="position:absolute; TOP:35px; RIGHT:100px">logout</a>

<?php
//define('TITLE', 'View all Users');
//print '<h1>'.$_SESSION['user_id'].'</h1>';
print '<h2>Newsfeed</h2>';
print'<a href="uploaded.php?id='.$_SESSION['user_id'].'"> Edit my Profile</a><br />';
$dbc = mysql_connect('localhost', 'khallcol', '@Lbcc2015');
mysql_select_db('khallcol_REGISTRATION', $dbc);



$query = 'SELECT email, username, photo, biography FROM USER ORDER BY user_id ASC';
$row = mysql_num_rows($query);

if($r = mysql_query($query, $dbc)){

    while ($row = mysql_fetch_array($r)){
        print "<div><blockquote>{$row['photo']}</blockquote><br/>{$row['email']}</blockquote><br/> 
        About {$row['username']}:<br />\"{$row['biography']}\"<br/>\n";
        print "__________________________________________________";

    }
} else {
    print'<p class="error">Could not retrieve the data because:<br />' . mysql_error($dbc) . '.</><p>The query being run was : ' . $query . '</p>';
}
        
        
mysql_close($dbc);


?>
    </body>
