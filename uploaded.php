<?php session_start(); ?>
<!DOCTYPE html>
<html>
        <head>
            <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>Edit Profile</title>
      <link href="../css/style.css" rel="stylesheet">
        </head>
    <body>
        <a href="newsfeed.php">
            <img src="../images/backbutton.png" alt="go back" style="position:absolute; TOP:35px; LEFT:50px"; height="35px" /></a>   
        <a href="handle_login2.php"  style="position:absolute; TOP:35px; RIGHT:100px">logout</a>
          <h1>Update Profile</h1>      

<?php
define('TITLE', 'Register');
$file = '../users/users.txt';
$dbc = mysql_connect('localhost', 'khallcol', '@Lbcc2015');
mysql_select_db('khallcol_REGISTRATION', $dbc);
$id = $_GET['id'];
$email = $_GET['email'];
$password = $_GET['password'];
$nopic = '<img src="../images/nopic.png" alt="no picture" height="100px" />';


$query1 = "SELECT * FROM USER WHERE user_id = $id";
        if ($r = mysql_query($query1, $dbc)) {
        $row = mysql_fetch_array($r);
        $oname = $row['username'];
        $obiography = $row['biography'];
        $id = $row['user_id'];
        }
        
// Run the query

// Get the query stuff and put it into a variable

// Assign row variables to new variables


if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $filename = $_FILES['the_file']['name'];
    $upload = $_POST['the_file'];
    $name = $_POST['name'];
    $autobio = $_POST['autobiography'];
    $id = $_POST['id'];
    $photoupload = "";
    

        
//    if ($dbc = mysql_connect('localhost', 'khallcol', '@Lbcc2015')){
//        print '<p>successful connection</p>';
//    } else{
//        print '<p>could not connect</p>';
//        }
if (move_uploaded_file($_FILES['the_file']['tmp_name'], "../homework8uploads/{$_FILES['the_file']['name']}")){
        $photoupload = "<img src=\"../homework8uploads/$filename\" height=\"100px\"/>";
} else {
    $photoupload = "<img src=\"../images/nopic.png\" height=\"100px\"/>";
}
    
    


    

    
                
                $query = "UPDATE USER SET photo='$photoupload', biography ='$autobio' WHERE user_id = $id";
        
                

            if(@mysql_query($query, $dbc)){
            print"Your profile has been sucessfully updated!";


            } 

            

            

  
 
            



    
      mysql_close($dbc);  

}
        


?>
 <form action="uploaded.php" enctype="multipart/form-data" method="post">
    
            <input type="hidden" name="MAX_FILE_SIZE" value="300000" />
            <p><input type="file" name="the_file" src="../images/nopic.png"/></p>
            <input type="hidden" name="id" value="<?php print $_GET['id']; ?> " />
            <p>Biography: </p>
            <textarea name="autobiography" COLS=40 ROWS=4><?php print "$obiography"; ?></textarea>
            <p><input type="submit" name="submit" value="Submit" /></p>
                                                                                                              </form>



        
    </body>
</html>