<!DOCTYPE html> 
<html>
<head>
	<title>Total Calculations</title>
    <link href="../css/style.css" rel="stylesheet">
<a href="../index.html">
    <img src="../images/home.png" alt="go home" style="position:absolute; TOP:35px; LEFT:50px"; height="35px" /></a>     
</head>
<body>
<?php 
$session = $_POST['session'];
$name = $_POST['name'];
$year = $_POST['Year'];
$units = $_POST['units'];
$unitstotal = $units * 46;
$studentID = $_POST['studentID'];
$parking_permit = $_POST['parking_permit'];
$college_services = $_POST['college_services'];

if ($parking_permit == "PPNo") {
    $parking_permit = 0;
} else {
    $parking_permit = 30;
}

if ($college_services == "CSNo") {
    $college_services = 0;
} else {
    $college_services = 20;
}

$total = $unitstotal + $college_services + $parking_permit + 19;

print "<p>Units: $units<br/>
       Health Fee: $19<br/>
       College Services: $$college_services<br/>
       Parking Permit: $$parking_permit<br/><br/>
    
    $name, During $session session $year, your Tuition totals to $$total</p>
    ";


?>
</body>
</html>



