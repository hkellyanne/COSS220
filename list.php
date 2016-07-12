<!DOCTYPE html PUBLIC ".//W3C//DTDXHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://w3.org/1999/xhtml" xml:lang="en" lang="en">

    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>I Have This Sorted Out</title>
        <link href="../css/style.css" rel="stylesheet">
    </head>
    
    <body>
<a href="../index.html">
    <img src="../images/home.png" alt="go home" style="position:absolute; TOP:35px; LEFT:50px"; height="35px" /></a>     
        
    <?php
$words_array = explode(' ', $_POST['words']);
$original = implode('<br />', $words_array);

$words_array2 = explode(' ', $_POST['words']);
sort($words_array2);
$alpha = implode('<br />', $words_array2);

$words_array3 = explode(' ', $_POST['words']);
rsort($words_array3);
$ralpha = implode('<br />', $words_array3);


print "<p>Originally, the array looks like this: <br / > $original</p>";


print "<p>An alphabetized version of your list is: <br / > $alpha</p>";


print "<p>A reverse alphabetized version of your list is: <br / > $ralpha</p>";
?>
<form method="LINK" action="list.html">
<input type="submit" value="Try Again!">
</form>
    </body>
</html>