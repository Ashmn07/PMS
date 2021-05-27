<?php
session_start();
$q = $_SESSION['QUA'];
$total_amt=$_SESSION['AMT'];
$bname = $_SESSION['user_name'];
$mname = $_SESSION['MName'];
$contact = $_SESSION['contact'];
$address = $_SESSION['address'];
$id = $_SESSION['user_id'];
$servername = "localhost:3306";
$username = "root";
$password = "";
$dbname = "pms";
$corr_mess="";
$pay=$_POST['pay_mode'];
$sno = mt_rand(0,10000000);

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql="INSERT INTO temp_sale_order (SONO,BID,BNAME,BCONTACT,BADDRESS,MNAME,MQUANTITY,AMOUNT,PAY_MODE) 
  VALUES ('$sno','$id','$bname','$contact','$address','$mname','$q','$total_amt','$pay')";
  if ($conn->query($sql) === TRUE) {
     $corr_mess="Purchase Order has been Placed";
     } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
?>

<!DOCTYPE html>
<html>
<head>
  <title>Admin</title>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.13/semantic.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.13/semantic.min.js"></script>
  <style>
  body{
      background-color: #37414b;
      background-image: linear-gradient(315deg, #485461 0%, #28313b 74%);
  }
  </style>
</head>
<body>
<div class="ui secondary menu navbar" style="padding:3px; background-color:white;">
  <a class="ui item">
  <h2><i class="shopping cart icon" size="big"></i>MedKart</h2></a>
  <div class="right menu">
    <a href="customer.php" class="ui item">
    <h4>Home</h4>
    </a>
    <a href="adminsearch.php" class="ui item">
    <h4>Search Info</h4>
    </a>
      <a href="logout.php" class="ui item">
      <h4>Logout</h4>
      </a>
  </div>
</div>
<center>
<div style="width:50%;">
<div class="ui success message" >
  <i class="close icon"></i>
  <div class="header" style="height:250px;">
    <h1><i class="check circle icon" style="color: green"></i><br>
    Thank You Your Order Placed  successfully.
  </h1>
  </div>
  <p></p>
</div>
</div>
</center>
</body>
</html>
