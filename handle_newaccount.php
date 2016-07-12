
<!DOCTYPE html>
<html>
    
    <head>
        <title>Create an account</title>
      <link href="../css/style.css" rel="stylesheet">
        
        <style>
        .error {color: #FF0000;}
        </style>
    </head>
    <body>

       <a href="../index.html">
            <img src="../images/backbutton.png" alt="go back" style="position:absolute; TOP:35px; LEFT:50px"; height="35px" /></a>    
        
        
<?php


$firstnameErr = $lastnameErr = $emailErr = $passwordErr = $confirmErr = "";
$firstname = $lastname = $email = $password = $confirm = $month = $day = $year = $favanimal = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["firstname"])) {
    $firstnameErr = "Name is required";
  } else {
    $firstname = test_input($_POST["firstname"]);
  }

    
  if (empty($_POST["lastname"])) {
    $lastnameErr = "Last Name is required";
  } else {
    $lastname = test_input($_POST["lastname"]);
  }
    

  if (empty($_POST["email"])) {
    $emailErr = "E-mail is required";
  } else {
    $email = test_input($_POST["email"]);
  }


  if (empty($_POST["password"])) {
    $passwordErr = "Password is required";
  } else {
    $password = test_input($_POST["password"]);
  }

  if (empty($_POST["confirm"])) {
    $confirmErr = "Confirm Password is required";
  } else {
    $confirm = test_input($_POST["confirm"]);
  }
}




function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}



?>
            
            
            
            
    
<h2>Please complete this secure form to create an account:</h2>
            <p><span class="error">* required field </span> </p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

    First Name: <input type="text" name="firstname" size="20" required/>
    <span class="error">* <?php echo $firstnameErr;?></span>
   <br><br>
	Last Name: <input type="text" name="lastname" size="20" required/>
    <span class="error">* <?php echo $lastnameErr;?></span>
   <br><br>
    E-Mail: <input type="text" name="email" size="20" required/>
    <span class="error">* <?php echo $emailErr;?></span>
   <br><br>
    Password: <input type="password" name="password" size="20" required/>
    <span class="error">* <?php echo $passwordErr;?></span>
   <br><br>
    Confirm Password: <input type="password" name="confirm" size="20" required/>
    <span class="error">* <?php echo $confirmErr;?></span>
   <br><br>
    Date of Birth: 
        
        <select name="Month" required>
        <option value="Month">Month</option>
        <option value="January">January</option>
        <option value="February">February</option>
        <option value="March">March</option>
        <option value="April">April</option>
        <option value="May">May</option>
        <option value="june">June</option>
        <option value="July">July</option>
        <option value="August">August</option>
        <option value="Septebmer">Septebmer</option>
        <option value="October">October</option>
        <option value="November">November</option>
        <option value="December">December</option>
        </select>
    
        <select name="Day" required>
        <option value="Day">Day</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="9">9</option>
        <option value="10">10</option>
        <option value="11">11</option>
        <option value="12">12</option>
        <option value="13">13</option>
        <option value="14">14</option>
        <option value="15">15</option>
        <option value="16">16</option>
        <option value="17">17</option>
        <option value="18">18</option>
        <option value="19">19</option>
        <option value="20">20</option>
        <option value="21">21</option>
        <option value="22">22</option>
        <option value="23">23</option>
        <option value="24">24</option>
        <option value="25">25</option>
        <option value="26">26</option>
        <option value="27">27</option>
        <option value="28">28</option>
        <option value="29">29</option>
        <option value="30">30</option>
        <option value="31">31</option>
        </select>
    
        <select name="Year" required>
        <option value="Year">Year</option>
        <option value="1950">1950</option>
        <option value="1951">1951</option>
        <option value="1952">1952</option>
        <option value="1953">1953</option>
        <option value="1954">1954</option>
        <option value="1955">1955</option>
        <option value="1956">1956</option>
        <option value="1957">1957</option>
        <option value="1958">1958</option>
        <option value="1959">1959</option>
        <option value="1960">1960</option>
        <option value="1961">1961</option>
        <option value="1962">1962</option>
        <option value="1963">1963</option>
        <option value="1964">1964</option>
        <option value="1965">1965</option>
        <option value="1966">1966</option>
        <option value="1967">1967</option>
        <option value="1968">1968</option>
        <option value="1969">1969</option>
        <option value="1970">1970</option>
        <option value="1971">1971</option>
        <option value="1972">1972</option>
        <option value="1973">1973</option>
        <option value="1974">1974</option>
        <option value="1975">1975</option>
        <option value="1976">1976</option>
        <option value="1977">1977</option>
        <option value="1978">1978</option>
        <option value="1979">1979</option>
        <option value="1980">1980</option>
        <option value="1981">1981</option>
        <option value="1982">1982</option>
        <option value="1983">1983</option>
        <option value="1984">1984</option>
        <option value="1985">1985</option>
        <option value="1986">1986</option>
        <option value="1987">1987</option>
        <option value="1988">1988</option>
        <option value="1989">1989</option>
        <option value="1990">1990</option>
        <option value="1991">1991</option>
        <option value="1992">1992</option>
        <option value="1993">1993</option>
        <option value="1994">1994</option>
        <option value="1995">1995</option>
        <option value="1996">1996</option>
        <option value="1997">1997</option>
        <option value="1998">1998</option>
        <option value="1999">1999</option>
        <option value="2000">2000</option>
        <option value="2001">2001</option>
        <option value="2002">2002</option>
        <option value="2003">2003</option>
        <option value="2004">2004</option>
        <option value="2005">2005</option>
        <option value="2006">2006</option>
        <option value="2007">2007</option>
        <option value="2008">2008</option>
        <option value="2009">2009</option>
        <option value="2010">2010</option>
        <option value="2011">2011</option>
        <option value="2012">2012</option>
        <option value="2013">2013</option>
        <option value="2014">2014</option>
        <option value="2015">2015</option>
        <option value="2016">2016</option>
        <option value="2017">2017</option>
        <option value="2018">2018</option>
        </select>

    <br><br>
    Favorite Animal: 
        
        <select name="favanimal">
        <option value="Pick One">Pick One</option>
        <option value="Dog">Dog</option>
        <option value="Cat">Cat</option>
        <option value="Panda">Panda</option>
        <option value="Koala">Koala</option>
        <option value="Alpaca">Alpaca</option>
        </select>

    <br><br>
    I agree to the Terms and Conditions<span class="error">* </span>
        <input type="radio" name="terms1" value="Yes"/> Yes <input type="radio" name="terms2" value="Yes"/>      No</p>
    

       
    
	<input type="submit" name="submit" value="Create New Account" />
    

</form>        
    
    
<?php
$date = date(format, timestamp);
$yearsub = $_POST["Year"];
$year = date(Y);
$daysold = ($year - $yearsub) * 365;
$favanimal = $_POST["favanimal"];

if($_POST["favanimal"] == "Dog"){
    $animaltip = "Dogs are a Man's best friend!";
}
elseif($_POST["favanimal"] == "Cat"){
    $animaltip = "Cats will take over the world!";
}
elseif($_POST["favanimal"] == "Panda"){
    $animaltip = "Pandas are my favorite!";
}
elseif($_POST["favanimal"] == "Koala"){
    $animaltip = "Koala's have huge ears!";
}
elseif($_POST["favanimal"] == "Koala"){
    $animaltip = "Koala's have huge ears!";
}
elseif($_POST["favanimal"] == "Alpaca"){
    $animaltip = "Alpaca's are super fluffy!";
}



if(isset($_POST['submit']) and ($_POST['terms1'] == 'Yes')) {
    
    if($_POST["Month"] == "January" and Date(m) == 1){
    print "It's your birthday month, Happy Birthday!";
    echo nl2br("\n");
    }
    if($_POST["Month"] == "February" and Date(m) == 2){
        print "It's your birthday month, Happy Birthday!";
        echo nl2br("\n");
    }
    if($_POST["Month"] == "March" and Date(m) == 3){
        print "It's your birthday month, Happy Birthday!";
        echo nl2br("\n");
    }
    if($_POST["Month"] == "April" and Date(m) == 4){
        print "It's your birthday month, Happy Birthday!";
        echo nl2br("\n");
    }
    if($_POST["Month"] == "May" and Date(m) == 5){
        print "It's your birthday month, Happy Birthday!";
        echo nl2br("\n");
    }
    if($_POST["Month"] == "June" and Date(m) == 6){
        print "It's your birthday month, Happy Birthday!";
        echo nl2br("\n");
    }
    if($_POST["Month"] == "July" and Date(m) == 7){
        print "It's your birthday month, Happy Birthday!";
        echo nl2br("\n");
    }
    if($_POST["Month"] == "August" and Date(m) == 8){
        print "It's your birthday month, Happy Birthday!";
        echo nl2br("\n");
    }
    if($_POST["Month"] == "September" and Date(m) == 9){
        print "It's your birthday month, Happy Birthday!";
        echo nl2br("\n");
    }
    if($_POST["Month"] == "October" and Date(m) == 10){
        print "It's your birthday month, Happy Birthday!";
        echo nl2br("\n");
    }
    if($_POST["Month"] == "November" and Date(m) == 11){
        print "Happy Birthday!";
        echo nl2br("\n");
    }
    if($_POST["Month"] == "December" and Date(m) == 12){
        print "It's your birthday month, Happy Birthday!";
        echo nl2br("\n");

    }

    print "$firstname $lastname, thank you for creating an account with us. You are $daysold days old. I like $favanimal";
    print "s too, $animaltip";
}
elseif($_POST['terms2'] == 'No' or $_POST['terms'] == '') {
    print "You must agree with our Terms and Conditions";
}


?>
    
    </body>
    
    
    
    
    
    
</html>
